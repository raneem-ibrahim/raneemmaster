<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\contact;
use App\Models\WeeklyProgram;
use App\Models\DailyProgram;
use App\Models\User;
use Carbon\Carbon;
// use App\Notifications\NewContactMessage;
// use App\Models\User;

class AdminController extends Controller
{
    // هاي الدالة بتجيبلي معلومات المستخدم الي عمل تسجيل دخول
    public function show1( )
    {
        $user = auth()->user(); // أو Auth::user()
        return view('dashboard.pages.profile', compact('user'));
    }
    public function dash( )
    {
       
        return view('dashboard.dash');
    }


    //  هاي الدالة لتحديث صورة  البروفايل تبعت المعلم
    // public function update(Request $request)
    // {
    //     // التحقق من تسجيل الدخول
    //     if (!auth()->check()) {
    //         return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
    //     }
    
    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);
    
    //     $user = auth()->user();
    
    //     if ($request->hasFile('image')) {
    //         // حذف الصورة القديمة إذا كانت موجودة
    //         if ($user->image) {
    //             Storage::delete('public/' . $user->image);
    //         }
    
    //         // حفظ الصورة الجديدة
    //         $path = $request->file('image')->store('profile_images', 'public');
    //         $user->image = $path;
    //         $user->save();
    //     }
    
    //     return back()->with('success', 'تم تحديث الصورة بنجاح');
    // }
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

public function hifiz(){
    return view('dashboard.formhifiz');
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




}
