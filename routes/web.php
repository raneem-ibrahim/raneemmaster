<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';






// مسار الطلاب (الافتراضي)
// Route::get('/', function () {
//     return view('public.site');
// })->name('public.site');

// مسارات تحتاج مصادقة
Route::middleware(['auth'])->group(function () {
    // لوحة تحكم المدير
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
    
    // لوحة تحكم المعلم
    Route::middleware(['role:teacher'])->group(function () {
        Route::get('/teacher', function () {
            return view('dashboard.dash');
        })->name('dashboard.dash');
    });
    Route::middleware(['role:student'])->group(function () {
        Route::get('/public/index', function () {
            return view('public.index');
        })->name('public.index');
    });
    
});



Route::get('/dash', function () {
    return view('dashboard.dash');
});





Route::get('/index', function () {
    return view('public.index');
});
Route::get('/contact', function () {
    return view('public.contact');
});
Route::get('/aboutus', function () {
    return view('public.aboutus');
});
Route::get('/bloge', function () {
    return view('public.bloge');
});