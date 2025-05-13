<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
// use App\Models\User; // تأكد من استيراد User إذا لم يكن مضافاً

class HomeController extends Controller
{
    public function showPublicCourses()
    {
        // جلب الكورسات التي أنشأها مستخدمون دورهم "admin"
        $courses = Course::whereHas('creator', function ($query) {
            $query->where('role', 'admin');
        })->withCount('levels')->get();

        return view('public.bloge', compact('courses'));
    }

    public function showCourseDetails($id)
    {
        $course = Course::with(['levels.lessons', 'teachers'])->findOrFail($id);
        return view('public.course_details', compact('course'));
    }
}

