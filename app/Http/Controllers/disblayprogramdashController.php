<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyProgram;
class disblayprogramdashController extends Controller
{
public function myHifzPrograms()
{
    $teacherId = auth()->id();

  $programs = WeeklyProgram::with(['days'])
    ->where('teacher_id', $teacherId)
    ->where('program_type', 'حفظ')  // شرط الجدول الأسبوعي
    ->whereHas('days', function ($query) {
        $query->where('type', 'حفظ'); // شرط أيام الجدول اليومية
    })
    ->orderBy('week_start', 'desc')
    ->paginate(1);


    return view('teacher.hifz_programs', compact('programs'));
}

public function updateDay(Request $request, $id)
{
    $day = \App\Models\DailyProgram::findOrFail($id);
    $day->update($request->only(['date', 'type', 'portion_type', 'surah', 'from_verse', 'to_verse', 'notes']));

    return redirect()->back()->with('success', 'تم تحديث بيانات اليوم بنجاح');
}



    // جدول المراجعة
  public function myReviewPrograms()
{
    $teacherId = auth()->id();

    $programs = WeeklyProgram::with(['days'])
        ->where('teacher_id', $teacherId)
        ->where('program_type', 'حفظ')  // ✅ هذا هو الصح
        ->whereHas('days', function ($query) {
            $query->where('type', 'مراجعة'); // شرط أيام الجدول اليومية
        })
        ->orderBy('week_start', 'desc')
        ->paginate(1);

    return view('teacher.review_programs', compact('programs'));
}


    // تحديث يوم (مشترك للحفظ والمراجعة)
    public function updateDay2(Request $request, $id)
    {
        $day = \App\Models\DailyProgram::findOrFail($id);
        $day->update($request->only(['date', 'type', 'portion_type', 'surah', 'from_verse', 'to_verse', 'notes']));

        return redirect()->back()->with('success', 'تم تحديث بيانات اليوم بنجاح');
    }
}






