<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surah;
use App\Models\DailyProgram;
use App\Models\WeeklyProgram;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TeacherProgramController extends Controller
{
    public function studentsList()
    {
        $students = auth()->user()->students()->with('memorizationProgram')->get();
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
  
   
    


    public function storeteacher(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'age' => 'required|integer|min:18|max:80',
            'gender' => 'required|in:ذكر,أنثى',
            'teaching_from_age' => 'required|integer|min:3|max:80',
            'teaching_to_age' => 'required|integer|min:3|max:80',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->age = $request->age;
        $user->gender = $request->gender === 'ذكر' ? 'male' : 'female';
        $user->role = 'teacher';
        $user->min_age = $request->teaching_from_age;
        $user->max_age = $request->teaching_to_age;
    
        // معالجة الصورة إن وُجدت
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teacher_images', 'public');
            $user->image = $path;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'تم حفظ بيانات المعلم بنجاح');
    }
    // function view teachers
    public function viewteacher()
{
   

    $teachers = User::where('role', 'teacher')
    ->withCount('students') // نحسب عدد الطلاب لكل معلم
    ->get();

return view('teacher.viewteacher', compact('teachers'));
}

}