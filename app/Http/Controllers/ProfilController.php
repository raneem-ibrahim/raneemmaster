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
    
        // التحقق مما إذا كان الطالب قد اختار معلمًا بالفعل
        $hasTeacher = $student->teacher()->exists();
    
        // جلب المعلم المختار إذا وجد
        $selectedTeacher = null;
        if ($hasTeacher) {
            $selectedTeacher = $student->teacher()->with('students')->first();
        }
    
        // جلب قائمة المعلمين المتاحة إذا لم يتم اختيار معلم بعد
        $teachers = null;
        if (!$hasTeacher) {
            $desiredStudies = json_decode($student->desired_study ?? '[]');
    
            $teachers = User::where('role', 'teacher')
                ->where('gender', $student->gender)
                ->where('min_age', '<=', $student->age)
                ->where('max_age', '>=', $student->age)
                ->where(function ($query) use ($desiredStudies) {
                    foreach ($desiredStudies as $study) {
                        $query->orWhere('teaching_type', $study)
                              ->orWhere('teaching_type', 'both');
                    }
                })
                ->get();
        }
    
        return view('student.studentprofile', compact('student', 'teachers', 'selectedTeacher'));
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
 
}
