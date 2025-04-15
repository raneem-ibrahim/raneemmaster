<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // هاي الدالة بتجيبلي معلومات المستخدم الي عمل تسجيل دخول
    public function show( )
    {
        // dd('داخل دالة العرض');
        $user = auth()->user(); // أو Auth::user()
        return view('dashboard.pages.profile', compact('user'));
    }
    public function dash( )
    {
       
        return view('dashboard.dash');
    }


    // هاي الدالة للصورة 
    
       
// لحد هون 

    
}
