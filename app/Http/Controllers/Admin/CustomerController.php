<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('customers.index', [
            'customers' => User::where('role', 'customer')->latest()->paginate('5')
        ]);
    }
}
