<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;

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

Route::get('/', function () {
    return view('welcome');
});
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
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// لوحة تحكم المعلم
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher', function () {
        return view('dashboard.dash');
    })->name('dashboard.dash');
});

// صفحة الطالب
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/public/index', function () {
        return view('public.index');
    })->name('public.index');
});




Route::get('/dash', function () {
    return view('dashboard.dash');
});
Route::get('/dash', [AdminController::class, 'dash']);





Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::get('/index', function () {
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
Route::get('/profile', [AdminController::class, 'show1'])->name('profile');// هاد الروت مشان يجيب معلومات المستخدم الي عمل تسجيل دخول
// Route::get('/view', [ProfilController::class, 'view']);// هاد الروت مشان يجيب معلومات المستخدم الي عمل تسجيل دخول للطالب
// Route::get('/logingo', [ProfilController::class, 'logingo']);
Route::get('/student', [ProfilController::class, 'student']);
// هاي لتحديث الصورة جوا  بروفايل المعلم
Route::put('/photo', [AdminController::class, 'update']) ->name('profile.update') ->middleware('auth');
// هاي لتحديث الصورة جوا  بروفايل الطالب
Route::put('/photo', [ProfilController::class, 'update']) ->name('photostudent') ->middleware('auth');



    Route::post('contact', [AdminController::class, 'storecontact']);
    // ->name('contact.store');



    Route::get('/showmessages/{id}', [AdminController::class, 'show2']);
    // ->name('dasboard.show');
// هاد راوت اختيار المعلم 
    Route::post('/select-teacher', [ProfilController::class, 'selectTeacher'])->name('select.teacher');

