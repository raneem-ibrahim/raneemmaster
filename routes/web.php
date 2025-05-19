<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TeacherProgramController;
use App\Http\Controllers\WeeklyProgramController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\disblayprogramdashController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LessonViewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // أو أي صفحة ثانية مثل login
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';







// لوحة تحكم المدير
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard.layouts.dashboard');
//     })->name('admin.dashboard');
// });
// لوحة تحكم المدير
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dash'])->name('admin.dashboard');
});

// Route::middleware(['auth', 'role:teacher'])->group(function () {
//     Route::get('/teacher', [AdminController::class, 'teacherDash'])->name('dashboard.dash');
// });


// لوحة تحكم المعلم
// Route::get('/disblaydash', [TeacherProgramController::class, 'disblaydash']);
// Route::middleware(['auth', 'role:teacher'])->group(function () {
//     Route::get('/teacher', function () {
//         return view('dashboard.layouts.dashboard');
//     })->name('dashboard.dash');
// });
// راوت الداشبورد للمعلم
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher', [TeacherProgramController::class, 'disblaydash'])->name('dashboard.dash');
});

// // صفحة الطالب
// Route::middleware(['auth', 'role:student'])->group(function () {
//     Route::get('/public/index', function () {
//         return view('public.index');
//     })->name('public.index');
// });

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/public/index', [FeedbackController::class, 'index'])->name('public.index');
});

Route::get('/', [FeedbackController::class, 'index']);

// Route::get('/dash', [AdminController::class, 'dash']);





Route::get('/login', function () {
    return view('auth.login');
})->name('login');



// Route::get('/', function () {
//     return view('public.index');
// })->name('index');
Route::get('/contact', function () {
    return view('public.contact');
});
Route::get('/aboutus', function () {
    return view('public.aboutus');
});
Route::get('/bloge', function () {
    return view('public.bloge');
});
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// Route::get('/', [FeedbackController::class, 'index']);

// Route::get('/profile' , function(){
//     return view('dashboard.pages.profile')->name('profile');
// });
Route::view('/profile', 'dashboard.pages.profile')->name('profile');






Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/students', [studentController::class, 'students'])->name('students.index');
    Route::post('/teacher/students', [studentController::class, 'store'])->name('students.store');
    Route::put('/teacher/students/{id}', [studentController::class, 'update'])->name('students.update');
    Route::delete('/teacher/students/{id}', [studentController::class, 'destroy'])->name('students.destroy');
});


// عرض كل برامج الحفظ الخاصة بالمعلم الحالي
Route::get('/teacher/my-hifz-programs', [ disblayprogramdashController::class, 'myHifzPrograms'])->name('teacher.programs.hifz');

Route::put('/teacher/day/{id}', [disblayprogramdashController::class, 'updateDay'])->name('teacher.day.update');

// Route::get('/teacher/hifz-programs', [disblayprogramdashController::class, 'myHifzPrograms'])->name('teacher.hifz.programs');

Route::get('/teacher/review-programs', [disblayprogramdashController::class, 'myReviewPrograms'])->name('teacher.review.programs');

Route::put('/teacher/day/{id}/update', [disblayprogramdashController::class, 'updateDay2'])->name('teacher.day.update');




                                            // AdminController

Route::get('/profile', [AdminController::class, 'show1'])->name('profile');// هاد الروت مشان يجيب معلومات المستخدم الي عمل تسجيل دخول
// هاي لتحديث الصورة جوا  بروفايل المعلم
Route::put('/photo', [AdminController::class, 'update']) ->name('profile.update') ->middleware('auth');
Route::post('contact', [AdminController::class, 'storecontact']);
// ->name('contact.store');
Route::get('/showmessages/{id}', [AdminController::class, 'show2']);
    // ->name('dasboard.show');
    Route::get('/addteacher', [AdminController::class, 'addteacher'])->name('addteacher');

    // إرسال رسالة من الأدمن إلى المعلم
Route::post('/teachers/{teacherId}/send-message', [AdminController::class, 'sendMessage'])->name('teachers.sendMessage');
// Route for deleting teacher
Route::delete('/teachers/{teacher}', [AdminController::class, 'destroy'])->name('teachers.destroy');
Route::get('/teachers/{id}/edit', [AdminController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [AdminController::class, 'update'])->name('teachers.update');








                                               // ProfilController
    
// هاد راوت اختيار المعلم 
Route::post('/select-teacher', [ProfilController::class, 'selectTeacher'])->name('select.teacher');
// هاي لتحديث الصورة جوا  بروفايل الطالب
Route::put('/photo', [ProfilController::class, 'update']) ->name('photostudent') ->middleware('auth');
Route::post('/setMemorizationProgram', [ProfilController::class, 'setMemorizationProgram'])->name("setMemorizationProgram");
Route::get('/student', [ProfilController::class, 'student']);
Route::post('/profile/achievements', [ProfilController::class, 'saveAchievements'])->name('profile.saveAchievements');
Route::post('/student/update-info', [ProfilController::class, 'updateInfo'])->name('student.updateInfo');

// Route::get('/view-courses', [ProfileController::class, 'viewCourses'])->name('courses.view');






                                                   // Teachercontroller

Route::get('/viewstudent', [TeacherProgramController::class, 'studentsList'])->name('viewstudent');

Route::get('/teacher/weekly-lesson-views', [TeacherProgramController::class, 'weeklyLessonViews']);

Route::post('/weekly-program/select-students', [TeacherProgramController::class, 'selectStudents'])->name('weekly-program.selectStudents');
Route::get('/weekly-program/create', [TeacherProgramController::class, 'create'])->name('weekly-program.create');
// Route::post('/weekly-program/store', [TeacherProgramController::class, 'store'])->name('weekly-program.store');;
 Route::get('/weekly-program/create/single/{student}', [TeacherProgramController::class, 'createSingle'])->name('weekly-program.create.single');                                       
 Route::post('/teachers/store', [TeacherProgramController::class, 'storeteacher'])->name('teachers.store');
 Route::get('/teachers', [TeacherProgramController::class, 'viewteacher'])->name('teachers.index');
 Route::get('/createcourse', [TeacherProgramController::class, 'createcourse'])->middleware('auth');;
 Route::post('/teacher/courses', [TeacherProgramController::class, 'storeCourse'])->name('teacher.courses.store');
// صفحة إنشاء المستويات
Route::get('/courses', [TeacherProgramController::class, 'listCourses'])->name('courses.index');
Route::post('/course/{courseId}/levels/store', [TeacherProgramController::class, 'storeLevel'])->name('levels.store');
Route::delete('/courses/{id}', [TeacherProgramController::class, 'destroy'])->name('courses.destroy');

Route::put('/teacher/profile/update', [TeacherProgramController::class, 'updateprofileteacher'])->name('teacher.profile.update');


Route::get('/lessons/create', [TeacherProgramController::class, 'createlesson'])->name('lessons.create');
Route::post('/lessons', [TeacherProgramController::class, 'storelesson'])->name('lessons.store');
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/lessons', [TeacherProgramController::class, 'dashboardLessons'])->name('teacher.lessons');
});
Route::put('/lessons/update', [TeacherProgramController::class, 'update'])->name('lessons.update');
Route::put('/lessons/update', [TeacherProgramController::class, 'update'])->name('lessons.update');
Route::delete('/lessons/{id}', [TeacherProgramController::class, 'destroylessons'])->name('lessons.destroy');




                                                        //  WeeklyProgramController

 Route::post('/weekly-program/store', [WeeklyProgramController::class, 'store'])->name('weekly-program.store');
 


                                  //HomeController
 Route::get('/bloge', [HomeController::class, 'showPublicCourses'])->name('public.courses');
 Route::get('/courses/{id}', [HomeController::class, 'showCourseDetails'])->name('public.course.details');
Route::post('/track-lesson-view', [LessonViewController::class, 'track'])->middleware('auth');




  