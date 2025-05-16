<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LessonView;
use Illuminate\Support\Facades\Auth;
use App\Models\LessonProgress;

class LessonViewController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $lessonId = $request->lesson_id;

        LessonView::updateOrCreate(
            ['user_id' => $userId, 'lesson_id' => $lessonId],
            ['viewed_at' => now()]
        );

        return response()->json(['status' => 'success']);
    }

// في LessonController.php
public function trackView(Request $request) {
    $validated = $request->validate([
        'lesson_id' => 'required|exists:lessons,id'
    ]);

    $view = LessonView::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'lesson_id' => $validated['lesson_id']
        ],
        ['updated_at' => now()]
    );

    return response()->json([
        'status' => 'success',
        'view' => $view
    ]);
}



}

