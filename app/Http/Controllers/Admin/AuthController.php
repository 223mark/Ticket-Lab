<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //register page
    public function registerPage()
    {
        return view('auth.register');
    }

    //login page
    public function loginPage()
    {
        return view('auth.login');
    }

    // public function passwordResetPage()
    // {
    //     return view('auth.reset-password');
    // }
}
