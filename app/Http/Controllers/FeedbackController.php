<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    Feedback::create([
        'user_id' => auth()->id(),
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'تم إرسال رأيك بنجاح!');
}


public function index()
{
    $feedbacks = Feedback::with('user')->latest()->take(10)->get(); // نجيب آخر 10 تعليقات
    return view('public.index', compact('feedbacks'));
}


}
