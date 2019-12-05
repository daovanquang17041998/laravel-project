<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getAdminLogin()
    {
        return view('login');
    }
    public function postAdminLogin(Request $request)
    {
        $this->validate($request,[
            'txtEmail'   => "required",
            'txtPass'    => "required"
        ],[
            'txtEmail.required' => "Bạn chưa nhập Email",
            'txtPass.required'  => "Bạn chưa nhập Mật khẩu",
        ]);
        $email = $request->txtEmail;
        $password = $request->txtPass;
        if (Auth::attempt(['email' => $email, 'password' => $password,'level'=>1])) {
            return redirect('/index');
        }else{
            return redirect('/login-admin')->with('loi','Sai Email hoặc mật khẩu hoặc bạn không có quyền đăng nhập vào trang này');
        }
    }
}
