<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{

        // هاي الدالة بتجيبلي معلومات المستخدم الي عمل تسجيل دخول
        public function show()
        {
            $users = auth()->user();
        
            if (!$users) {
                return redirect('/login')->with('error', 'يجب تسجيل الدخول أولاً.');
            }
        
            return view('student.studentprofile', compact('users'));
        }

        
   public function student(){
    return view('student.studentprofile');
   }
   public function logingo(){
    return view('auth.login');
   }
}
