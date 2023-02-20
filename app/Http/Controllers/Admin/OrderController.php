<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Operator;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //order index
    public function index()
    {

        $orderData = Order::select('orders.*',  'bus_tickets.*', 'operators.*', 'orders.id as orderId')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->leftJoin('operators', 'operators.id', 'orders.operator_id')->filter(request(['tag', 'searchText']))
            ->where('expired_status', 'unexpired')
            ->orderBy('orders.id', 'desc')
            ->paginate(7);

        return view('orders.index', [
            'orders' => $orderData,
            'operators' => Operator::get(),
            'searchText' => '',
        ]);
    }

    //order destory
    public function destory(Order $order)
    {
        $order->delete();
        return redirect()->route('orders#index')->with('deleteMessage', 'Order Canceled Successfully.');
    }


    //ticket deatil page
    public function ticketDetail($id)
    {
        $ticketData = BusTicket::select('bus_tickets.*', 'routes.*')
            ->rightJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->where('ticket_id', $id)
            ->first();

        return view('orders.ticket-detail', [
            'ticket' => $ticketData,
        ]);
    }

    //orders || tickets expired page
    public function setOrdersExpiredPage($date)
    {
        $data = Order::select('orders.*',  'bus_tickets.*', 'operators.*', 'orders.id as orderId')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->leftJoin('operators', 'operators.id', 'orders.operator_id')
            ->orderBy('orders.id', 'desc')
            ->where('departure_date', $date)
            ->get();

        //dd($data->toArray());

        return view('orders.set-expired', compact('date', 'data'));
    }

    //set orders||tickets expired
    public function setOrdersExpired($date)
    {
        $updateData =  [
            'expired_status' => 'expired'
        ];
        Order::where('departure_date', $date)->update($updateData);

        return redirect()->route('orders#index')->with('updateMessage', 'All Tickets with  this `${$date}` are expired');
    }

    //epxired tickets || orders index
    public function expiredTicketsIndex()
    {
        $expiredOrders =
            Order::select('orders.*',  'bus_tickets.*', 'operators.*', 'orders.id as orderId')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->leftJoin('operators', 'operators.id', 'orders.operator_id')->filter(request(['tag', 'searchText']))
            ->where('expired_status', 'expired')
            ->orderBy('orders.id', 'desc')
            ->paginate(7);

        return view('orders.expired-tickets', compact('expiredOrders'));
    }
}
