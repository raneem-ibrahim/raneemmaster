<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LessonView;

class LessonViewController extends Controller
{
    public function track(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
        ]);

        LessonView::firstOrCreate([
            'user_id' => auth()->id(),
            'lesson_id' => $request->lesson_id,
        ]);

        return response()->json(['status' => 'success']);
    }
}
