<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use App\Models\LessonProgress;
use App\Models\LessonView;

class ProfilController extends Controller
{
    /**
     * عرض صفحة ملف الطالب مع المعلم المختار أو قائمة المعلمين المتاحة.
     */
  
     public function student()
{
    $student = auth()->user();
    if (!$student) {
        abort(403, 'يجب أن تكون مسجلاً للدخول للوصول إلى هذه الصفحة.');
    }
    
    
    // جلب البرنامج الأسبوعي المرتبط بالطالب
    $weeklyProgram = $student->studentWeeklyPrograms()->with('weeklyProgram.dailyPrograms')->first();

    
 // جلب البرنامج الأسبوعي المرتبط بالطالب
$weeklyProgram = $student->studentWeeklyPrograms()
->with('weeklyProgram.dailyPrograms')
->first();


$dailyAchievements = [];
$dailyAchievements = [];

    if ($weeklyProgram && $weeklyProgram->weeklyProgram) {
        // 2. تجميع المهام حسب التاريخ
        $tasksByDate = $weeklyProgram->weeklyProgram->dailyPrograms->groupBy('date');

        // 3. جلب جميع إنجازات الطالب مرة واحدة
        $allAchievements = \App\Models\DailyAchievement::where('user_id', $student->id)
            ->whereIn('daily_program_id', $weeklyProgram->weeklyProgram->dailyPrograms->pluck('id'))
            ->get()
            ->keyBy('daily_program_id');

        foreach ($tasksByDate as $date => $tasks) {
            // 4. التحقق من أنواع المهام المطلوبة لهذا اليوم (تحويل Collection إلى array)
            $requiredTypes = $tasks->pluck('type')->unique()->toArray();
            
            $completedTypes = [];
            foreach ($tasks as $task) {
                if (isset($allAchievements[$task->id]) && $allAchievements[$task->id]->status) {
                    $completedTypes[$task->type] = true;
                }
            }

            // 5. حساب النسبة المئوية
            $progress = 0;
            if (in_array('حفظ', $requiredTypes) && in_array('مراجعة', $requiredTypes)) {
                // إذا كان اليوم يحتوي على حفظ ومراجعة
                $progress = (isset($completedTypes['حفظ']) ? 50 : 0) + 
                           (isset($completedTypes['مراجعة']) ? 50 : 0);
            } else {
                // إذا كان اليوم يحتوي على نوع واحد فقط
                $progress = !empty($completedTypes) ? 100 : 0;
            }

            // 6. تخزين النتائج
            $dailyAchievements[] = [
                'day' => $tasks->first()->day,
                'date' => $date,
                'progress' => $progress,
                'is_completed' => ($progress == 100)
            ];
        }
    }


    

    // التحقق مما إذا كان الطالب بحاجة لاختيار برنامج الحفظ
    $needsMemorizationProgram = !$student->memorizationProgram;
    
    $hasTeacher = $student->teacher()->exists();
    $selectedTeacher = $hasTeacher
        ? $student->teacher()->with('students')->first()
        : null;
    
    $teachers = null;
    if (!$hasTeacher) {
        $teachers = User::where('role', 'teacher')
            ->where('gender', $student->gender) // فقط المعلمون من نفس جنس الطالب
            ->where('min_age', '<=', $student->age)
            ->where('max_age', '>=', $student->age)
            ->get();
    }

    // هاي جلب الدورات 

    $courses = $selectedTeacher ? Course::where('created_by', $selectedTeacher->id)->with('levels')->get() : collect();
 // أو حسب نوع الربط اللي بدك 
 
// جلب دروس الفيديو المصنفة حسب مستويات المعلم المرتبط بالطالب
$lessonsByLevel = [];

$teacher = $student->teacher()->first();

if ($teacher) {
    // جلب المستويات التي تحتوي على دروس أضافها هذا المعلم
    $levels = \App\Models\Level::with(['course', 'lessons' => function ($query) use ($teacher) {
        $query->where('teacher_id', $teacher->id);
    }])->get();

    foreach ($levels as $level) {
        if ($level->lessons->count() > 0 && $level->course) {
            $lessonsByLevel[] = [
                'course_title' => $level->course->title,
                'level_title' => $level->title,
                'lessons' => $level->lessons,
            ];
        }
    }
}

  
    // حساب تقدم الحفظ والمراجعة
    $hifzProgress = [
        'total' => 0,
        'completed' => 0,
    ];
    
    $reviewProgress = [
        'total' => 0,
        'completed' => 0,
    ];

    foreach ($student->studentWeeklyPrograms as $program) {
        foreach ($program->weeklyProgram->dailyPrograms as $day) {
            if ($day->type === 'حفظ') {
                $hifzProgress['total']++;
                if ($day->achievement && $day->achievement->status) {
                    $hifzProgress['completed']++;
                }
            } elseif ($day->type === 'مراجعة') {
                $reviewProgress['total']++;
                if ($day->achievement && $day->achievement->status) {
                    $reviewProgress['completed']++;
                }
            }
        }
    }

    $hifzPercentage = $hifzProgress['total'] > 0 ? round(($hifzProgress['completed'] / $hifzProgress['total']) * 100) : 0;
    $reviewPercentage = $reviewProgress['total'] > 0 ? round(($reviewProgress['completed'] / $reviewProgress['total']) * 100) : 0;


    return view('student.studentprofile', compact(
        'student',
        'teachers',
        'selectedTeacher',
        'needsMemorizationProgram',
                'weeklyProgram', // تمرير بيانات البرنامج الأسبوعي
                'dailyAchievements' ,// إضافة بيانات الإنجاز اليومي
                'courses' ,
              'lessonsByLevel', // ✅ تمرير الدورات مع الدروس
        // لنسبة الحفظ
        'hifzPercentage',
        'reviewPercentage',
        'hifzProgress',
        'reviewProgress'
    ));
   


    
}




     
     
     


    /**
     * تنفيذ اختيار المعلم من قبل الطالب.
     */
    public function selectTeacher(Request $request)
    {
        $student = auth()->user();
        $teacherId = $request->input('teacher_id');

        // التحقق مما إذا كان الطالب قد اختار معلمًا بالفعل
        $hasTeacher = DB::table('student_teacher')
            ->where('student_id', $student->id)
            ->exists();

        if (!$hasTeacher) {
            // ربط الطالب بالمعلم
            DB::table('student_teacher')->insert([
                'student_id' => $student->id,
                'teacher_id' => $teacherId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'تم اختيار المعلم بنجاح.');
        } else {
            return redirect()->back()->with('error', 'لقد قمت باختيار معلم بالفعل.');
        }
    }
     //  هاي الدالة لتحديث صورة  البروفايل تبعت للطالب
     public function update(Request $request)
     {
         // التحقق من تسجيل الدخول
         if (!auth()->check()) {
             return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
         }
     
         $request->validate([
             'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         ]);
     
         $user = auth()->user();
     
         if ($request->hasFile('image')) {
             // حذف الصورة القديمة إذا كانت موجودة
             if ($user->image) {
                 Storage::delete('public/' . $user->image);
             }
     
             // حفظ الصورة الجديدة
             $path = $request->file('image')->store('profile_images', 'public');
             $user->image = $path;
             $user->save();
         }
     
         return back()->with('success', 'تم تحديث الصورة بنجاح');
     }
     
 // لحد هون 

//  هاي دالة اختيار برنامج الحفظ من قبل الطالب 
public function setMemorizationProgram(Request $request)
{
    $validated = $request->validate([
        'memorization_program' => 'required|in:half_page,one_page,two_pages'
    ]);

    try {
        $user = auth()->user();
        
        $program = $user->memorizationProgram()->firstOrNew();
        $program->program = $validated['memorization_program']; // تغيير هنا
        $program->save();

        \Log::debug('Saved Data:', [
            'user_id' => $user->id,
            'program' => $program->program,
            'exists_in_db' => $user->memorizationProgram()->exists()
        ]);

        return back()->with('success', 'تم حفظ البرنامج بنجاح');
        
    } catch (\Exception $e) {
        \Log::error('Save Error:', ['error' => $e->getMessage()]);
        return back()->with('error', 'حدث خطأ أثناء الحفظ: ' . $e->getMessage());
    }

}
// هاي دالة لحفظ انجاز الطالب 
public function saveAchievements(Request $request)
{
    $user = auth()->user();

    foreach ($request->input('achievements', []) as $dailyProgramId => $data) {
        \App\Models\DailyAchievement::updateOrCreate(
            [
                'user_id' => $user->id,
                'daily_program_id' => $dailyProgramId,
            ],
            [
                'type' => $data['type'],
                'status' => isset($data['status']) ? true : false,
            ]
        );
    }

    return redirect()->back()->with('success', 'تم حفظ الإنجاز بنجاح.');
}

// public function viewCourses()
// {
//     $courses = Course::with('levels')->get(); // جلب كل الكورسات
//     return view('student.viewcourses', compact('courses'));
// }

// هاي دالة تعديل الباسورد ورقم الهاتف للطالب
public function updateInfo(Request $request)
{
    $request->validate([
        'phone' => ['required', 'regex:/^07\d{8}$/'],
        'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$/'],
    ]);

    $student = auth()->user();

    $student->phone = $request->phone;
    $student->password = bcrypt($request->password);
    $student->save();

    return back()->with('success', 'تم تحديث المعلومات بنجاح');
}

}
