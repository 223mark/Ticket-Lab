<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashboard index
    public function index()
    {
        $operatorCount = Operator::count();
        $allOrdersCount = Order::count();
        $todayOrderCount = $this->todayOrder();

        $order = Order::select('orders.*', 'bus_tickets.*')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->orderBy('orders.created_at')->take(5)->get();

        //dd($order->toArray());
        return view('dashboard.index', compact('operatorCount', 'allOrdersCount', 'todayOrderCount', 'order'));
    }


    private function todayOrder()
    {
        $todayDate = Carbon::today();
        $data = Order::where('created_at', $todayDate->format('Y-m-d'))->count();
        return $data;
    }
}
