<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //profile
    public function profile()
    {
        return view('profile.profile');
        // return view('profile.profile', [
        //     'data' => User::where('id', auth()->user()->id)->first(),
        // ]);
    }

    public function passwordChagePage()
    {
        return view('profile.password-change');
    }
}
