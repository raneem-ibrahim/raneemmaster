<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyProgram;
use Illuminate\Http\Request;
class HifzProgramController extends Controller
{

    public function index(Request $request)
    {
        $user_id = $request->query('id');

        $programs = DailyProgram::where('id', $user_id)->get();

        return response()->json([
            'success' => true,
            'data' => $programs
        ]);
    }


}
