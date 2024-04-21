<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check() && Auth::user()->role_id === 1) {
        //     return redirect()->route('dashboard')->with('success', 'Chào mừng Admin');
        // } else if(Auth::check() && Auth::user()->role_id === 2) {
        //     return redirect()->route('dashboard')->with('success', 'Chào mừng Leader');
        // } else if(Auth::check() && Auth::user()->role_id === 3) {
        //     return redirect()->route('dashboard')->with('success', 'Chào mừng Saler');
        // }
        // return redirect()->route('login')->with('error', 'Tài khoản / mật khẩu không đúng');
        if (Auth::check()) {
            return $next($request);
        }

        return redirect('/login');
    }
}
