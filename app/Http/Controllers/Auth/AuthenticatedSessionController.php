<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);


        $request->authenticate();
        $request->session()->regenerate();
      // 🔴 أضف هذا الجزء لتسجيل الدخول
    \App\Models\UserLogin::create([
        'user_id' => auth()->id(),
        'ip_address' => $request->ip(),
        'user_agent' => $request->header('User-Agent'),
    ]);
        $user = $request->user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        if ($user->role === 'teacher') {
            return redirect()->route('dashboard.dash');
        }
        if ($user->role === 'student') {
            return redirect()->route('public.index');
        }
        // return redirect()->route('public.site');    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
