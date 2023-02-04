<?php

namespace App\Http\Controllers\Admin;

use App\Models\Routes;
use App\Models\Operator;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //
    public function operatorFilter(Request $request)
    {
        $ticketCode = BusTicket::select(
            'routes.*',
            'bus_tickets.id as busticketId',
            'bus_tickets.ticket_code as ticket_code',
            'operators.id as operatorId',
            'operators.operator_name as operatorName',
            'operators.img as operatorImage'
        )
            ->leftJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->groupBy('bus_tickets.ticket_code')
            ->where('bus_tickets.operator_id', $request->result)
            ->paginate('6');
        $operators = Operator::get();
        $routes = Routes::get();
        return response()->json([
            'data' => $ticketCode
        ]);
    }
}
