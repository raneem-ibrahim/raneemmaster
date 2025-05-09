<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surah;
use App\Models\DailyProgram;
use App\Models\WeeklyProgram;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Storage;
// use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Level;
use App\Models\Lesson;

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



// هاي دالة حفظ انشاء الكورس 
public function createcourse(){
     
     // إنشاء الكورس من قبل الأدمن (أو المعلم حسب الحالة)
     $courses = Course::all(); // جلب جميع الكورسات

    return view('courses.create');
}
public function storeCourse(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'details' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('courses', 'public');
    }

    Course::create([
        'title' => $request->title,
        'description' => $request->description,
        'details' => $request->details,
        'image' => $imagePath,
        'created_by' => auth()->id(),
    ]);

    return redirect()->back()->with('success', 'تم إنشاء الكورس بنجاح');
}


// هاي دالة عرض صفحة انشاء المستويات 
public function createLevelPage($courseId)
{
    // جلب الكورس من قاعدة البيانات
    $course = Course::findOrFail($courseId);

    return view('levels.create', compact('course'));
}
public function listCourses()
{
    $courses = Course::all(); // أو ممكن تعمل paginate إذا كانت كثيرة

    return view('courses.index', compact('courses'));
}
// This function  store levle
public function storeLevel(Request $request, $courseId)
{
    // تحقق من صحة البيانات
    $request->validate([
        'title' => 'required|string|max:255',
        'level_number' => 'required|integer|min:1',
    ]);

    // جلب الكورس المطلوب
    $course = Course::findOrFail($courseId);

    // إنشاء المستوى وربطه بالكورس
    $course->levels()->create([
        'title' => $request->title,
        'level_number' => $request->level_number,
    ]);

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->back()->with('success', 'تم إضافة المستوى بنجاح.');
}








public function createlesson()
{
    $courses = Course::with('levels')->get(); // جلب كل الكورسات ومستوياتها
    return view('courses.addlesson', compact('courses'));
}




// function store lesson
public function storelesson(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'level_id' => 'required|exists:levels,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'video_file' => 'required|file|mimetypes:video/mp4,video/x-msvideo,video/quicktime|max:50000', // 50MB حد أقصى
    ]);

    $videoPath = $request->file('video_file')->store('videos', 'public'); // تخزين في storage/app/public/videos

    Lesson::create([
        'level_id' => $request->level_id,
        'title' => $request->title,
        'description' => $request->description,
        'video_url' => $videoPath, // هذا الحقل نفسه الموجود عندك
    ]);

    return redirect()->back()->with('success', 'تمت إضافة الدرس بنجاح!');
}

// function dedlete courses
public function destroy($id)
{
    $course = Course::findOrFail($id);

    // حذف الصورة إذا كانت موجودة
    if ($course->image && \Storage::exists('public/' . $course->image)) {
        \Storage::delete('public/' . $course->image);
    }

    $course->delete();

    return redirect()->back()->with('success', 'تم حذف الدورة بنجاح.');
}



}