<?php

namespace App\Http\Controllers;
// use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\contact;
use App\Models\WeeklyProgram;
use App\Models\DailyProgram;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

// use App\Notifications\NewContactMessage;
// use App\Models\User;

class AdminController extends Controller
{
    // هاي الدالة بتجيبلي معلومات المستخدم الي عمل تسجيل دخول
    public function show1( )
    {
        $user = auth()->user(); // أو Auth::user()
            // جلب جميع الكورسات التي أنشأها الأدمن
    $courses = Course::all();
        return view('dashboard.pages.profile', compact('user','courses'));
    }
    public function dash( )
    {
         $studentsCount = User::where('role', 'student')->count();
    $teachersCount = User::where('role', 'teacher')->count();
    $coursesCount = Course::count();
    $weeklyProgramsCount = WeeklyProgram::count(); // أو ممكن نقسمهم حسب النوع (حفظ/مراجعة)

       
   

    // باقي البيانات لو بدك
    $studentsCount = User::where('role', 'student')->count();
    $teachersCount = User::where('role', 'teacher')->count();
    $coursesCount = Course::count();
    $weeklyProgramsCount = WeeklyProgram::count();

    // عدد تسجيلات الدخول لكل يوم لآخر 7 أيام
    $loginCounts = DB::table('user_logins')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->where('created_at', '>=', now()->subDays(6)->startOfDay()) // 7 أيام بما فيهم اليوم
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    // نريد نملأ الأيام الفارغة بصفر (اختياري ولكن جميل للعرض)
    $dates = collect();
    for ($i = 6; $i >= 0; $i--) {
        $dates->push(now()->subDays($i)->format('Y-m-d'));
    }

    // تحويل النتائج إلى مصفوفة تاريخ => عدد
    $loginCountsMap = $loginCounts->pluck('count', 'date');

    // بناء مصفوفة كاملة مع ملء الأيام الفارغة بـ 0
    $data = $dates->map(function($date) use ($loginCountsMap) {
        return [
            'date' => $date,
            'count' => $loginCountsMap->get($date, 0),
        ];
    });

    $teachers = User::where('role', 'teacher')
    ->with([
        'students:id,first_name,last_name,image,teacher_id',
        'courses',
        'weeklyPrograms',
    ])
    ->get();

 



        return view('dashboard.layouts.dashboard'  , compact(
        'studentsCount',
        'teachersCount',
        'coursesCount',
        'weeklyProgramsCount',
       'studentsCount',
        'teachersCount',
        'coursesCount',
        'weeklyProgramsCount',
        'data', // ترسل بيانات تسجيل الدخول
        'teachers '
    ));
    }

//     public function teacherDash()
// {
//     $teacher = auth()->user();

//     // جلب الطلاب المرتبطين بهذا المعلم من جدول student_teacher
//     $studentIds = \DB::table('student_teacher')
//                     ->where('teacher_id', $teacher->id)
//                     ->pluck('student_id');

//     $studentsCount = $studentIds->count();
//     $coursesCount = Course::where('created_by', $teacher->id)->count(); // إذا كان عندك created_by في courses

//     $weeklyProgramsCount = WeeklyProgram::whereIn('user_id', $studentIds)->count();

//     return view('dashboard.layouts.dashboard', compact(
//         'studentsCount',
//         'coursesCount',
//         'weeklyProgramsCount'
//     ));
// }


//  public function dash( )
//     {
        
       
//         return view('dashboard.layouts.dashboard');
//     }


   
    public function updateImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    try {
        $user = auth()->user();
        
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($user->image && Storage::exists('public/'.$user->image)) {
                Storage::delete('public/'.$user->image);
            }

            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
            $user->save();

            return response()->json([
                'success' => true,
                'image_url' => asset("storage/$path")
            ]);
        }

        return response()->json(['success' => false], 400);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
    
// لحد هون 
// form contactus 
public function storecontact(Request $request)
{
    contact::create([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        // is_read سيتم إضافته تلقائيًا كـ false بسبب default
    ]);

    return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
}


// هي لعرض الرسائل 
public function show2($id)
{
    $message = Contact::findOrFail($id);

    // حدّث الرسالة إلى "مقروءة"
    if (!$message->is_read) {
        $message->is_read = true;
        $message->save(); // ✅ احفظ التغيير في قاعدة البيانات
    }

    return view('dashboard.show', compact('message'));
}




public function createProgram($studentId)
{
    $student = User::findOrFail($studentId);
    return view('teacher.create_program', compact('student'));
}

public function store(Request $request, $studentId)
    {
        $request->validate([
            'portion_type' => 'required|in:half_page,one_page,two_pages',
            'daily.*.from_verse' => 'nullable|string',
            'daily.*.to_verse' => 'nullable|string',
            'daily.*.surah_name' => 'nullable|string',
            'daily.*.notes' => 'nullable|string',
        ]);

        $teacher = auth()->user();
        $student = User::findOrFail($studentId);
        $weekStart = Carbon::now()->startOfWeek(Carbon::SUNDAY); // بداية الأسبوع الأحد

        $weeklyProgram = WeeklyProgram::create([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
            'week_start_date' => $weekStart,
        ]);

        $days = [
            'الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'
        ];

        foreach ($days as $index => $dayName) {
            if ($dayName == 'الجمعة') {
                continue; // عطلة الجمعة
            }

            DailyProgram::create([
                'weekly_program_id' => $weeklyProgram->id,
                'day_name' => $dayName,
                'type' => $dayName == 'السبت' ? 'سرد' : 'حفظ/مراجعة',
                'portion_type' => $request->portion_type,
                'from_verse' => $request->daily[$index]['from_verse'] ?? null,
                'to_verse' => $request->daily[$index]['to_verse'] ?? null,
                'surah_name' => $request->daily[$index]['surah_name'] ?? null,
                'notes' => $request->daily[$index]['notes'] ?? null,
                'date' => $weekStart->copy()->addDays($index),
            ]);
        }

        return redirect()->back()->with('success', 'تم إنشاء البرنامج الأسبوعي بنجاح ✅');
    }

    public function addteacher(){
        return view('teacher.addteacher');
        }



public function destroy($id)
{
    // العثور على المعلم بواسطة المعرف
    $teacher = User::findOrFail($id);

    // التأكد من أن المستخدم هو "أدمن" (اختياري)
    if(auth()->user()->role != 'admin') {
        return redirect()->route('teachers.index')->with('error', 'ليس لديك صلاحية لحذف هذا المعلم.');
    }

    // حذف المعلم
    $teacher->delete();

    // إعادة توجيه مع رسالة تأكيد
    return redirect()->route('teachers.index')->with('success', 'تم حذف المعلم بنجاح.');
}
// function edite
public function edit($id)
{
    $teacher = User::where('role', 'teacher')->findOrFail($id);
    return view('teacher.edit_teacher', compact('teacher'));
}
// function update teacher
public function update(Request $request, $id)
{
    $teacher = User::where('role', 'teacher')->findOrFail($id);

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $teacher->id,
        'age' => 'required|integer',
        'gender' => 'required|in:male,female',
        'min_age' => 'nullable|integer',
        'max_age' => 'nullable|integer',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('teachers', 'public');
        $validated['image'] = $path;
    }

    $teacher->update($validated);

    return redirect()->route('teachers.index')->with('success', 'تم تحديث بيانات المعلم بنجاح');
}



}
