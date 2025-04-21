<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }
    
        $user = auth()->user();
        
        if (!in_array($user->role, $roles)) {
            abort(403, 'غير مصرح بالوصول');
        }
    
        return $next($request);
    }

//     public function handle($request, Closure $next, $role)
// {
//     if (auth()->check() && auth()->user()->role === $role) {
//         return $next($request);
//     }

//     return redirect('/login'); // ← هنا بيرجع المستخدم للوج إن لو ما عنده الدور
// }

}
