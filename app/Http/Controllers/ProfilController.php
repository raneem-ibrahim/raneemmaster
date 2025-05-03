<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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



    return view('student.studentprofile', compact(
        'student',
        'teachers',
        'selectedTeacher',
        'needsMemorizationProgram',
                'weeklyProgram' // تمرير بيانات البرنامج الأسبوعي
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





}
