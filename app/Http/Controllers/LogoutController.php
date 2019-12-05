<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function getAdminLogout()
    {
        if(Auth::guard()->check())
        {
            Auth::guard()->logout();
            return redirect('/login-admin');
        }
    }
}
