<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $role = User::find(Auth::user()->id)->role->role_id;
            if (in_array('all', $roles)) {
                return $next($request);
            } else if ($role == 'administrator'){
                return $next($request);
            } else if (Auth::check() && in_array($role, $roles)) {
                return $next($request);
            }
            return back()->with('error', 'Không có quyền truy cập vào trang này.');
        }
        return redirect('/login');
    }
}
