<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('login');
        }
    }
    public function postLogin(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|min:3|max:100',
        //     // 'phone' => 'required|min:8|numeric',
        //     'password' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
        // ], [
        //     'email.required' => 'Email không được bỏ trống',
        //     'email.min' => 'Email tối thiểu có 3 kí tự',
        //     'email.max' => 'Email tối đa 100 kí tự',
        //     // // 'phone.required' => 'Số điện thoại không được để trống',
        //     // // 'phone.min' => 'Số điện thoại quá ngắn',
        //     // // 'phone.numeric' => 'Số điện thoại chỉ được điền số',
        //     'password.required' => 'Mật khẩu không được để trống',
        //     'password.min' => 'Mật khẩu có tối thiểu 8 kí tự',
        //     'password.max' => 'Mật khẩu tối đa có 100 kí tự',
        //     'password.regex' => 'Mật khẩu cần có chữ hoa,thường,số'
        // ]);
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            if (Auth::check() && Auth::user()->role_id === 1) {
                return redirect()->route('dashboard')->with('success', 'Chào mừng Admin');
            } else if (Auth::check() && Auth::user()->role_id === 2) {
                return redirect()->route('dashboard')->with('success', 'Chào mừng Leader');
            } else if (Auth::check() && Auth::user()->role_id === 3) {
                return redirect()->route('dashboard')->with('success', 'Chào mừng Saler');
            }
        }
        return redirect()->route('login')->with('error', 'Tài khoản / Mật khẩu không chính xác , vui lòng kiểm tra lại !');
    }
    public function logout()
    {
        // Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
