<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WeeklyProgram;
class HifzProgramController extends Controller
{
    

    public function index()
    {
        $weeklyHifzPrograms = WeeklyProgram::with('dailyPrograms')
            ->where('program_type', 'حفظ')
            ->get();
    
        return response()->json([
            'status' => true,
            'data' => $weeklyHifzPrograms
        ]);
    }
    
}
