<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function showPublicCourses()
{
    $courses = Course::withCount('levels')->get();
    return view('public.bloge', compact('courses'));
}
public function showCourseDetails($id)
{
    $course = Course::with(['levels.lessons', 'teachers'])->findOrFail($id);
    return view('public.course_details', compact('course'));
}



}
