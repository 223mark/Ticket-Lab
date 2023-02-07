<?php

namespace App\Http\Controllers\Admin;

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

        $ticketCode = BusTicket::select(
            'routes.*',
            'bus_tickets.id as busticketId',
            'bus_tickets.ticket_code as ticket_code',
            'bus_tickets.date as date',
            'operators.id as operatorId',
            'operators.operator_name as operatorName',
            'operators.img as operatorImage'
        )
            ->leftJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->groupBy('bus_tickets.ticket_code');
        if ($request->result == 'all') {
            $ticketCode = $ticketCode->paginate('6');
        } else {
            $ticketCode = $ticketCode->where('bus_tickets.operator_id', $request->result)->paginate('6');
        }


        $operators = Operator::get();
        $routes = Routes::get();
        return response()->json([
            'data' => $ticketCode
        ]);
    }

    //operator filter by search to datestring
    public function operatorFilterbySearch(Request $request)
    {

        if (request('searchItem') == '') {
            $filterData = Operator::latest()->get();
        } else {
            $filterData = Operator::when(request('searchItem'), function ($query) {
                $query->where('operator_name', 'like', '%' . request('searchItem') . '%')
                    ->orWhere('email', 'like', '%' . request('searchItem') . '%');
            })
                ->latest()
                ->get();
        }

        return response()->json([
            'data' => $filterData
        ]);
    }
}
