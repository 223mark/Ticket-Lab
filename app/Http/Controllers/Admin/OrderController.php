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
    //index

    public function index()
    {



        $orderData = Order::select('orders.*',  'bus_tickets.*', 'operators.*')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id')
            ->leftJoin('operators', 'operators.id', 'orders.operator_id')->filter(request(['tag', 'searchText']))
            ->paginate(request('perPage'));
        // dd($orderData->toArray());


        // $orderData = Order::get();
        // $date = Carbon::createFromFormat('d/m/Y', $orderData->departureDate)->format('Y-m-d');
        // $currentDate = new \DateTime();
        // $expireDate = new \DateTime($orderData->created_at);
        // dd($expireDate);

        // dd($orderData->toArray());
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

    //date

    // public function expiredTicket () {

    // }
}
