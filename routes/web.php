<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TeacherProgramController;
use App\Http\Controllers\WeeklyProgramController;
use App\Http\Controllers\HomeController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.layouts.dashboard');
    })->name('admin.dashboard');
});

// لوحة تحكم المعلم
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher', function () {
        return view('dashboard.layouts.dashboard');
    })->name('dashboard.dash');
});

// صفحة الطالب
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/public/index', function () {
        return view('public.index');
    })->name('public.index');
});




// Route::get('/dash', function () {
//     return view('dashboard.dash');
// });
Route::get('/dash', [AdminController::class, 'dash']);





Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::get('/', function () {
    return view('public.index');
})->name('index');
Route::get('/contact', function () {
    return view('public.contact');
});
Route::get('/aboutus', function () {
    return view('public.aboutus');
});
Route::get('/bloge', function () {
    return view('public.bloge');
});


// Route::get('/profile' , function(){
//     return view('dashboard.pages.profile')->name('profile');
// });
Route::view('/profile', 'dashboard.pages.profile')->name('profile');


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

// Route::get('/view-courses', [ProfileController::class, 'viewCourses'])->name('courses.view');






                                                   // Teachercontroller

Route::get('/viewstudent', [TeacherProgramController::class, 'studentsList'])->name('viewstudent');


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



Route::get('/lessons/create', [TeacherProgramController::class, 'createlesson'])->name('lessons.create');
Route::post('/lessons', [TeacherProgramController::class, 'storelesson'])->name('lessons.store');




                                                        //  WeeklyProgramController

 Route::post('/weekly-program/store', [WeeklyProgramController::class, 'store'])->name('weekly-program.store');
 


                                  //HomeController
 Route::get('/bloge', [HomeController::class, 'showPublicCourses'])->name('public.courses');
 Route::get('/courses/{id}', [HomeController::class, 'showCourseDetails'])->name('public.course.details');
