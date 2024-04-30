<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $roles = Role::find($user->role_id);
            $roles = $roles->permission()->pluck('route_name');
            $data = $roles->toArray();
            $route = $request->route()->getName();
            if($user->role_id == 1 || in_array($route, $data)){
                return $next($request);
            }else{
                return back()->with('error', 'Không có quyền truy cập vào trang này.');
            }
        }
        return redirect('/login');
    }
}
