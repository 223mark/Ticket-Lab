<?php

namespace App\Http\Controllers\Api;

use App\Models\Routes;
use App\Models\Location;
use App\Models\Operator;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //get all location
    public function getAllLocation()
    {
        return response()->json([
            'locations' => Location::get()
        ]);
    }

    //get all operators
    public function getAllOperator()
    {
        return response()->json([
            'operators' => Operator::get()
        ]);
    }

    //get all tickets 
    public function getAllTickets()
    {
        $ticket = Routes::select('bus_tickets.*', 'routes.*', 'operators.*')
            ->leftJoin('bus_tickets', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->get();

        return response()->json([
            'ticket' => $ticket
        ]);
    }
}
