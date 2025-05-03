<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WeeklyProgram;
use App\Models\DailyProgram;
use App\Models\StudentWeeklyProgram;
// use Carbon\Carbon;


use Carbon\Carbon;

class WeeklyprogramController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'week_start' => 'required|date',
        'program' => 'required|array',
        'student_ids' => 'required|array|min:1',
    ]);

    $weeklyProgram = WeeklyProgram::create([
        'teacher_id' => auth()->id(),
        'week_start' => $request->week_start,
    ]);

    // خريطة لتحويل اسم اليوم إلى رقم اليوم بدءًا من الأحد
    $daysMap = [
        'الأحد'     => 0,
        'الإثنين'   => 1,
        'الثلاثاء'  => 2,
        'الأربعاء'  => 3,
        'الخميس'    => 4,
        'الجمعة'    => 5,
        'السبت'     => 6,
    ];

    // تحويل week_start إلى كائن Carbon
    $weekStart = Carbon::parse($request->week_start)->startOfDay();

    foreach ($request->program as $day => $data) {
        // التأكد من اليوم موجود في الخريطة
        if (!array_key_exists($day, $daysMap)) {
            continue;
        }

        // استخدم نسخة مستقلة من weekStart
        $date = $weekStart->copy()->addDays($daysMap[$day]);

        DailyProgram::create([
            'weekly_program_id' => $weeklyProgram->id,
            'day'               => $day,
            'type'              => $data['type'],
            'portion_type'      => $data['portion_type'],
            'surah'             => $data['surah'],
            'from_verse'        => $data['from_verse'],
            'to_verse'          => $data['to_verse'],
            'notes'             => $data['notes'] ?? null,
            'date'              => $date->toDateString(), // التاريخ بدون وقت
        ]);
    }

    foreach (array_unique($request->student_ids) as $studentId) {
        StudentWeeklyProgram::create([
            'user_id' => $studentId,
            'weekly_program_id' => $weeklyProgram->id,
        ]);
    }

    return redirect()->route('viewstudent')->with('success', 'تم إنشاء البرنامج الأسبوعي بنجاح');
}
}

