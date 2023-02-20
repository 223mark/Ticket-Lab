<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Routes;
use App\Models\Operator;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //operator filter by selectbox
    public function operatorFilterbySelect(Request $request)
    {

        $ticketCode = BusTicket::select('operators.*', 'bus_tickets.*', 'routes.*')
            ->rightJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->rightJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->groupBy('ticket_code');
        if ($request->result == 'all') {
            $ticketCode = $ticketCode->get();
        } else {
            $ticketCode = $ticketCode->where('bus_tickets.operator_id', $request->result)->get();
        }



        // $operators = Operator::get();
        //$routes = Routes::get();
        return response()->json([
            'data' => $ticketCode
        ]);
    }

    //orderfilterbyOperator
    public function orderfilterbyOperator(Request $request)
    {
        $orderData = Order::select('orders.*', 'operators.*', 'bus_tickets.*')
            ->leftJoin('operators', 'operators.id', 'orders.operator_id')
            ->leftJoin('bus_tickets', 'bus_tickets.ticket_id', 'orders.ticket_id');
        if ($request->result == 'all') {
            $orderData = $orderData->get();
        } else {
            $orderData = $orderData->where('bus_tickets.operator_id', $request->result)->get();
        }

        return response()->json([
            'data' => $orderData
        ]);
    }
}
