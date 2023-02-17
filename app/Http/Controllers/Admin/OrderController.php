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
        $orderData = Order::select('orders.*', 'bus_tickets.*')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->get()->dd();

        // $order = Order::with('bustickets')->get();
        // dd($order->toArray());
        // return view('orders.index', [

        //     'searchText' => ''
        // ]);
    }
}
