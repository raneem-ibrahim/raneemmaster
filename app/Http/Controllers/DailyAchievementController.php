<?php

namespace App\Http\Controllers;
use\App\Models\DailyAchievement;
use Illuminate\Http\Request;

class DailyAchievementController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'daily_program_id' => 'required|exists:daily_programs,id',
        'type' => 'required|string',
        'status' => 'required|boolean',
    ]);

    // احفظ أو حدّث الإنجاز
    $achievement = DailyAchievement::updateOrCreate(
        [
            'user_id' => $data['user_id'],
            'daily_program_id' => $data['daily_program_id'],
            'type' => $data['type'],
        ],
        ['status' => $data['status']]
    );

    return response()->json(['message' => 'Saved successfully', 'data' => $achievement], 201);
}


}
