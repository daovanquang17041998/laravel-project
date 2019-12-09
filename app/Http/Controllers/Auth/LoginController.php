<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddLoginPost;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(StoreAddLoginPost $request)
    {
        $email = $request->txtEmail;
        $password = $request->txtPass;
        if (Auth::attempt(['email' => $email, 'password' => $password,'level'=>1])) {
            return redirect()->route('index');
        }else{
            return redirect()->route('login.create')->with('loi','Sai Email hoặc mật khẩu hoặc bạn không có quyền đăng nhập vào trang này');
        }
    }
    public function logout()
    {
        if(Auth::guard()->check())
        {
            Auth::guard()->logout();
            return redirect('/login-admin');
        }
    }
}
