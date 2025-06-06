<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surah;
use App\Models\DailyProgram;
use App\Models\WeeklyProgram;
use Illuminate\Support\Facades\Auth;
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
    // هاي الدالة الي بتعرض لوحة التحكم تبعت المعلم
//   public function disblaydash()
// {
//     $teacher = Auth::user();

//     // عدد الطلاب المرتبطين بالمعلم
//     $studentCount = \DB::table('student_teacher')
//                         ->where('teacher_id', $teacher->id)
//                         ->count();

//     // عدد الكورسات التي أنشأها أو مرتبط بها
//     $courseCount = \DB::table('course_teacher')
//                         ->where('user_id', $teacher->id)
//                         ->count();

//     // عدد الدروس التي أنشأها
//     $lessonCount = Lesson::where('teacher_id', $teacher->id)->count();

//     // عدد البرامج الأسبوعية التي أنشأها
//     $weeklyProgramCount = WeeklyProgram::where('teacher_id', $teacher->id)->count();

//     // بيانات نشاط الطلاب للشارت
//     $studentActivityData = $this->studentActivity($teacher->id);

//     return view('dashboard.layouts.dashboard', compact(
//         'studentCount', 'courseCount', 'lessonCount', 
//         'weeklyProgramCount', 'studentActivityData'
//     ));
// }
public function disblaydash()
{
    $teacher = Auth::user();

    // عدد الطلاب المرتبطين بالمعلم
    $studentCount = \DB::table('student_teacher')
                        ->where('teacher_id', $teacher->id)
                        ->count();

    // عدد الكورسات التي أنشأها أو مرتبط بها
    $courseCount = \DB::table('course_teacher')
                        ->where('user_id', $teacher->id)
                        ->count();

    // عدد الدروس التي أنشأها
    $lessonCount = Lesson::where('teacher_id', $teacher->id)->count();

    // عدد البرامج الأسبوعية التي أنشأها
    $weeklyProgramCount = WeeklyProgram::where('teacher_id', $teacher->id)->count();

    // بيانات نشاط الطلاب للشارت
    $studentActivityData = $this->studentActivity($teacher->id);

    // جلب الطلاب المتأخرين - أضف هذا السطر
    $incompleteStudents = $this->getIncompleteStudents($teacher->id);

    return view('dashboard.layouts.dashboard', compact(
        'studentCount', 'courseCount', 'lessonCount', 
        'weeklyProgramCount', 'studentActivityData', 'incompleteStudents'
    ));
}

// دالة خاصة لجلب بيانات نشاط الطلاب
private function studentActivity($teacherId)
{
    // الحصول على طلاب المعلم
    $studentIds = \DB::table('student_teacher')
        ->where('teacher_id', $teacherId)
        ->pluck('student_id');

    // مشاهدات الدروس خلال الأسبوع
    $lessonViews = \DB::table('lesson_views')
        ->whereIn('user_id', $studentIds)
        ->where('viewed_at', '>=', now()->subWeek())
        ->selectRaw('DAYNAME(viewed_at) as day, COUNT(*) as count')
        ->groupBy('day')
        ->get();

    // إنجازات الحفظ خلال الأسبوع
    $memorizationAchievements = \DB::table('daily_achievements')
        ->whereIn('user_id', $studentIds)
        ->where('type', 'حفظ')
        ->where('status', true)
        ->where('created_at', '>=', now()->subWeek())
        ->selectRaw('DAYNAME(created_at) as day, COUNT(*) as count')
        ->groupBy('day')
        ->get();

    // أيام الأسبوع بالترتيب
    $daysOrder = [
        'Monday' => 'الاثنين',
        'Tuesday' => 'الثلاثاء',
        'Wednesday' => 'الأربعاء',
        'Thursday' => 'الخميس',
        'Friday' => 'الجمعة',
        'Saturday' => 'السبت',
        'Sunday' => 'الأحد'
    ];

    // تهيئة البيانات للـ chart
    $labels = array_values($daysOrder);
    $lessonViewsData = array_fill(0, 7, 0);
    $memorizationData = array_fill(0, 7, 0);

    foreach ($lessonViews as $view) {
        if (isset($daysOrder[$view->day])) {
            $index = array_search($daysOrder[$view->day], $labels);
            if ($index !== false) {
                $lessonViewsData[$index] = $view->count;
            }
        }
    }

    foreach ($memorizationAchievements as $achievement) {
        if (isset($daysOrder[$achievement->day])) {
            $index = array_search($daysOrder[$achievement->day], $labels);
            if ($index !== false) {
                $memorizationData[$index] = $achievement->count;
            }
        }
    }

    return [
        'labels' => $labels,
        'lesson_views' => $lessonViewsData,
        'memorization_achievements' => $memorizationData,
    ];
}

// دالة خاصة لجلب الطلاب المتأخرين
private function getIncompleteStudents($teacherId)
{
    // الحصول على طلاب المعلم
    $studentIds = \DB::table('student_teacher')
        ->where('teacher_id', $teacherId)
        ->pluck('student_id');

    // جلب الطلاب مع بياناتهم
    $students = User::whereIn('id', $studentIds)->get();

    // تحليل حالة كل طالب
    foreach ($students as $student) {
        // التحقق من مهام الحفظ غير المكتملة
        $student->memorization_incomplete = \DB::table('daily_achievements')
            ->where('user_id', $student->id)
            ->where('type', 'حفظ')
            ->where('status', false)
            ->where('created_at', '>=', now()->subWeek())
            ->exists();

        // التحقق من الدروس غير المشاهدة
        $assignedLessons = \DB::table('student_weekly_program')
            ->join('daily_programs', 'student_weekly_program.weekly_program_id', '=', 'daily_programs.weekly_program_id')
            ->where('student_weekly_program.user_id', $student->id)
            ->where('daily_programs.date', '<=', now())
            ->count();

        $viewedLessons = \DB::table('lesson_views')
            ->where('user_id', $student->id)
            ->where('viewed_at', '>=', now()->subWeek())
            ->count();

        $student->lessons_incomplete = ($assignedLessons > $viewedLessons);
    }

    // تصفية الطلاب المتأخرين فقط
    return $students->filter(function($student) {
        return $student->memorization_incomplete || $student->lessons_incomplete;
    });
}






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

    // public function createSingle(User $student)
    // {
    //     if ($student->role != 'student') {
    //         abort(404);
    //     }

    //     Session::put('selected_students', [$student->id]);
        
    //     if ($student->memorizationProgram) {
    //         Session::put('students_programe', $this->mapProgramToName($student->memorizationProgram->program));
    //     }

    //     $surahs = Surah::orderBy('id')->get();

    //     return view('teacher.create_programe', [
    //         'students' => collect([$student]),
    //         'surahs' => $surahs
    //     ]);
    // }

    private function mapProgramToName($programValue)
    {
        $map = [
            'half_page' => 'نص صفحة',
            'one_page' => 'صفحة',
            'two_pages' => 'صفحتين'
        ];
        return $map[$programValue] ?? null;
    }
  
   
    
// دالة تخزين المعلم من قبل الأدمن 

   public function storeteacher(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'min:8',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/'
        ],
        'phone' => 'required|regex:/^07\d{8}$/|unique:users,phone',
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
    $user->phone = $request->phone;
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
    $teachers = User::where('role', 'teacher')->get();
    return view('courses.create' , compact('teachers'));
}
public function storeCourse(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'details' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'teachers' => 'nullable|array', // التحقق من وجود معلمين (اختياري)
        'teachers.*' => 'exists:users,id', // كل ID لازم يكون لمعلم موجود
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('courses', 'public');
    }

    // 1. إنشاء الدورة
    $course = Course::create([
        'title' => $request->title,
        'description' => $request->description,
        'details' => $request->details,
        'image' => $imagePath,
        'created_by' => auth()->id(),
    ]);

    // 2. ربط المعلمين مع الدورة
    if ($request->has('teachers')) {
        $course->teachers()->attach($request->teachers); // علاقة many-to-many
    }

    return redirect()->back()->with('success', 'تم إنشاء الدورة وربط المعلمين بها بنجاح');
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
        'video_file' => 'required|file|mimes:mp4,avi,mov|max:51200', // 50MB كحد أقصى
    ]);

    // تخزين الفيديو في المسار المحدد
    $videoPath = $request->file('video_file')->store('videos', 'public'); // تخزين في storage/app/public/videos

    // التحقق من أن المستخدم معلم
    if (auth()->check() && auth()->user()->role === 'teacher') {
        // عرض معلومات المستخدم للتحقق من المعرف
        $user = auth()->user();

        // إنشاء الدرس وربطه بالمعلم
        Lesson::create([
            'course_id' => $request->course_id,
            'level_id' => $request->level_id,
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $videoPath, // مسار الفيديو المخزن
            'teacher_id' => auth()->id(), // ربط الدرس بالمعلم
        ]);

        return redirect()->back()->with('success', 'تمت إضافة الدرس بنجاح!');
    } else {
        return redirect()->back()->with('error', 'فقط المعلم يمكنه إضافة درس.');
    }
}




// function dedlete courses
public function destroy($id)
{
    $course = Course::findOrFail($id);

    // حذف الصورة من التخزين فقط (وليس من قاعدة البيانات)
    if ($course->image && \Storage::exists('public/' . $course->image)) {
        \Storage::delete('public/' . $course->image);
    }

    $course->delete(); // هذا الآن soft delete

    return redirect()->back()->with('success', 'تم حذف الدورة بنجاح.');
}



// هاي دالة تحديث الملف الشخصي للمعلم
public function updateprofileteacher(Request $request)
{
    $user = auth()->user();

    // تحديث صورة المعلم
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->store('teachers', 'public');
        $user->image = $path;
        $user->save();

        return response()->json([
            'success' => true,
            'image_url' => asset('storage/' . $path)
        ]);
    }

    // التحقق من الحقل المراد تحديثه
    if ($request->filled('field')) {
        $field = $request->input('field');

        switch ($field) {
            case 'phone':
                $request->validate([
                    'phone' => 'required|string|max:20',
                ]);
                $user->phone = $request->input('phone');
                $user->save();
                return back()->with('success', 'تم تحديث رقم الهاتف بنجاح.');

            case 'password':
                $request->validate([
                    'password' => 'required|string|min:6|confirmed',
                ]);
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return back()->with('success', 'تم تحديث كلمة المرور بنجاح.');

            default:
                return back()->with('error', 'حقل غير صالح.');
        }
    }

    return back()->with('error', 'لم يتم تحديد أي عملية.');
}
// هاي الدالة الي بتعرض الدروس للمعلم 
public function dashboardLessons()
{
    $teacher = auth()->user(); // المعلم المسجل دخوله

    $lessons = Lesson::where('teacher_id', $teacher->id)
        ->with('level.course') // تحميل الدورة المرتبطة عبر المستوى
        ->latest()
        ->get();
        $courseTitle = optional($lessons->first()->level->course)->title;


    $levels = Level::all();

    return view('teacher.dashboard_lessons', compact('lessons', 'levels','courseTitle'));
}



// هاي دالة تعديل على الدروس
public function updateLesson(Request $request)
{
    $request->validate([
        'lesson_id' => 'required|exists:lessons,id',
        'title' => 'required|string',
        'description' => 'required|string',
        'level_id' => 'required|exists:levels,id',
        'video_file' => 'nullable|file|mimes:mp4,mov,avi,webm|max:50000', // الحجم اختياري حسب حاجتك
    ]);

    $lesson = Lesson::findOrFail($request->lesson_id);

    // إذا تم رفع فيديو جديد
    if ($request->hasFile('video_file')) {
        $videoPath = $request->file('video_file')->store('videos', 'public');
        $lesson->video_url = 'storage/' . $videoPath;
    }

    $lesson->title = $request->title;
    $lesson->description = $request->description;
    $lesson->level_id = $request->level_id;
    $lesson->save();

    return redirect()->back()->with('success', 'تم تحديث الدرس بنجاح.');
}
// هاي دالة تعديل الدروس عن المعلم 

public function update(Request $request)
{
    $request->validate([
        'lesson_id' => 'required|exists:lessons,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'level_id' => 'required|exists:levels,id',
        'video_file' => 'nullable|file|mimes:mp4,avi,mov|max:200000', // 200MB
    ]);

    $lesson = Lesson::findOrFail($request->lesson_id);

    $lesson->title = $request->title;
    $lesson->description = $request->description;
    $lesson->level_id = $request->level_id;

    if ($request->hasFile('video_file')) {
        // احفظ الفيديو الجديد
        $path = $request->file('video_file')->store('videos', 'public');
        $lesson->video_url = $path;
    }

    $lesson->save();

    return redirect()->back()->with('success', 'تم تحديث الدرس بنجاح');
}

public function destroylessons($id)
{
    $lesson = Lesson::findOrFail($id);
    $lesson->delete(); // هذا حذف ناعم

    return redirect()->back()->with('success', 'تم حذف الدرس بنجاح');
}




}