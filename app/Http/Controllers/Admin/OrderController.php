<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index

    public function index()
    {
        return view('orders.index', [
            'orders' => Order::paginate('6')
        ]);
    }
}
