<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherProgramController extends Controller
{
    public function studentsList()
    {
        $students = User::where('role', 'student')->with('memorizationProgram')->get();
        return view('teacher.viewstudent', compact('students'));
    }

    public function selectStudents(Request $request)
    {
        $studentIds = $request->input('students');
        
        if (!$studentIds || count($studentIds) == 0) {
            return back()->with('error', 'يجب اختيار طالب واحد على الأقل');
        }

        $programFilter = $request->session()->get('current_program_filter');
        
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
        $studentIds = Session::get('selected_students', []);
        $students = User::whereIn('id', $studentIds)->get();
        $surahs = Surah::orderBy('id')->get();

        return view('teacher.create_programe', compact('students', 'surahs'));
    }

    public function createSingle(User $student)
    {
        if ($student->role != 'student') {
            abort(404);
        }

        Session::put('selected_students', [$student->id]);
        
        if ($student->memorizationProgram) {
            Session::put('students_programe', $this->mapProgramToName($student->memorizationProgram->program));
        }

        $surahs = Surah::orderBy('id')->get();

        return view('teacher.create_programe', [
            'students' => collect([$student]),
            'surahs' => $surahs
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program' => 'required|array',
            'program.*.type' => 'required|in:حفظ,مراجعة,سرد',
            'program.*.portion_type' => 'required|in:نص صفحة,صفحة,صفحتين',
            'program.*.surah' => 'required|string',
            'program.*.from_verse' => 'required|integer|min:1',
            'program.*.to_verse' => 'required|integer|min:1|gte:program.*.from_verse',
            'program.*.notes' => 'nullable|string',
        ]);
        
        foreach ($request->program as $day => $program) {
            $surah = Surah::where('name', $program['surah'])->first();
            if ($surah) {
                if ($program['to_verse'] > $surah->ayahs_count) {
                    return back()->withErrors([
                        'program.'.$day.'.to_verse' => 'عدد الآيات يتجاوز عدد آيات السورة'
                    ]);
                }
            }
        }
        
        // هنا يمكنك إضافة عملية حفظ البرنامج الأسبوعي
        // مثال:
        // $weeklyProgram = WeeklyProgram::create([...]);
        // foreach ($request->program as $day => $programData) {
        //     DailyProgram::create([...]);
        // }

        return redirect()->route('teacher.program.index')->with('success', 'تم إنشاء البرنامج بنجاح');
    }
}