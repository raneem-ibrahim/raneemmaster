<?php

namespace App\Http\Controllers;

// use App\Models\WeeklyProgram;
// use App\Models\DailyProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Carbon\Carbon;

class TeacherProgramController extends Controller
{
    public function studentsList()
    {
        $students = User::where('role', 'student')->with('memorizationProgram')->get();
        return view('teacher.viewstudent', compact('students'));
    }



   // في TeacherProgramController.php
public function selectStudents(Request $request)
{
    $studentIds = $request->input('students');
    
    if (!$studentIds || count($studentIds) == 0) {
        return back()->with('error', 'يجب اختيار طالب واحد على الأقل');
    }

    // احصل على معلومات البرنامج المفلتر
    $programFilter = $request->session()->get('current_program_filter');
    
    // احفظ الطلاب المحددين مع برنامجهم في السيشن
    $selectedStudents = User::whereIn('id', $studentIds)
        ->with('memorizationProgram')
        ->when($programFilter, function($query) use ($programFilter) {
            $query->whereHas('memorizationProgram', function($q) use ($programFilter) {
                $q->where('program', $this->mapProgramToValue($programFilter));
            });
        })
        ->get();

    Session::put('selected_students', $selectedStudents->pluck('id')->toArray());
    Session::put('students_program', $programFilter);

    return redirect()->route('weekly-program.create');
}

private function mapProgramToValue($programName)
{
    $map = [
        'نص صفحة' => 'half_page',
        'صفحة' => 'one_page',
        'صفحتين' => 'two_pages'
    ];
    return $map[$programName] ?? null;
}
public function create()
    {
        // نجيب الطلاب المختارين من السيشن
        $studentIds = Session::get('selected_students', []);

        // نرسلهم للواجهة
        $students = User::whereIn('id', $studentIds)->get();

        return view('teacher.create_programe', compact('students'));
    }
    public function createSingle(User $student)
{
    // تأكد أن المستخدم طالب
    if ($student->role != 'student') {
        abort(404);
    }

    // احفظ الطالب المحدد في السيشن
    Session::put('selected_students', [$student->id]);
    
    // احفظ برنامج الطالب إذا كان محدداً
    if ($student->memorizationProgram) {
        Session::put('students_programe', $this->mapProgramToName($student->memorizationProgram->program));
    }

    return view('teacher.create_programe', [
        'students' => collect([$student])
    ]);
}

private function mapProgramToName($programValue)
{
    $map = [
        'half_page' => 'نص صفحة',
        'one_page' => 'صفحة',
        'two_pages' => 'صفحتين'
    ];
    return $map[$programValue] ?? null;
}


}
