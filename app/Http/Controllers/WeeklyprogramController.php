<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WeeklyProgram;
use App\Models\DailyProgram;
use App\Models\StudentWeeklyProgram;
// use Carbon\Carbon;


class WeeklyprogramController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all()); // هذا يعرض كل ما أُرسل من الفورم
        // التحقق من البيانات الواردة
        $request->validate([
            'week_start' => 'required|date',
            'program' => 'required|array',
            'student_ids' => 'required|array|min:1', // التحقق من وجود طلاب
        ]);

        // تخزين البرنامج الأسبوعي
        $weeklyProgram = WeeklyProgram::create([
            'teacher_id' => auth()->id(), // المعلم الحالي
            'week_start' => $request->week_start, // بداية الأسبوع
        ]);

        // تخزين البرامج اليومية لكل يوم
        foreach ($request->program as $day => $data) {
            DailyProgram::create([
                'weekly_program_id' => $weeklyProgram->id, // ربط بالبرنامج الأسبوعي
                'day' => $day,
                'type' => $data['type'], // نوع الحفظ
                'portion_type' => $data['portion_type'], // نوع البرنامج (نصف صفحة، صفحة...)
                'surah' => $data['surah'], // السورة
                'from_verse' => $data['from_verse'], // الآية من
                'to_verse' => $data['to_verse'], // الآية إلى
                'notes' => $data['notes'] ?? null, // الملاحظات
            ]);
        }

        // ربط الطلاب بالبرنامج الأسبوعي
        // foreach ($request->student_ids as $studentId) {
        //     StudentWeeklyProgram::create([
        //         'user_id' => $studentId, // الطالب
        //         'weekly_program_id' => $weeklyProgram->id, // البرنامج الأسبوعي
        //     ]);
        // }

        foreach (array_unique($request->student_ids) as $studentId) {
            StudentWeeklyProgram::create([
                'user_id' => $studentId,
                'weekly_program_id' => $weeklyProgram->id,
            ]);
        }
        

        // الرد بتوجيه المستخدم إلى صفحة أخرى أو إعادة توجيه
        return redirect()->route('viewstudent')->with('success', 'تم إنشاء البرنامج الأسبوعي بنجاح');
    }   
}
