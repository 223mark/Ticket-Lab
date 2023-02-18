<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusTicket;
use App\Models\Operator;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index

    public function index()
    {

        $orderData = Order::select('orders.*',  'bus_tickets.*', 'operators.*')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->leftJoin('operators', 'operators.id', 'orders.operator_id')->filter(request(['tag', 'searchText']))
            ->paginate(request('perPage'));
        // $order = Order::with('bustickets')->get();
        return view('orders.index', [
            'orders' => $orderData,
            'operators' => Operator::get(),
            'searchText' => '',
        ]);
    }

    //perpage
    // public function perpage(Request $request)
    // {

    //     $orderData = Order::select('orders.*',  'bus_tickets.*', 'operators.*')
    //         ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
    //         ->leftJoin('operators', 'operators.id', 'orders.operator_id')
    //         ->paginate($request->perpage);

    //     dd($orderData->toArray());
    //     return view('orders.index', [
    //         'orders' => $orderData,
    //         'operators' => Operator::get(),
    //         'searchText' => ''
    //     ]);
    // }

    //ticket deatil
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
}
