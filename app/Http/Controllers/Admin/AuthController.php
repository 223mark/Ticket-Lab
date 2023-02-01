<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function registerPage()
    {
        return view('auth.register');
    }
    public function loginPage()
    {
        return view('auth.login');
    }

    public function passwordResetPage()
    {
        return view('auth.reset-password');
    }
}
