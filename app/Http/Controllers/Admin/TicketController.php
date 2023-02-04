<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusTicket;
use App\Models\Location;
use App\Models\Operator;
use App\Models\Routes;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function index()
    {

        $ticketCode = BusTicket::select(
            'routes.*',
            'bus_tickets.id as busticketId',
            'bus_tickets.ticket_code as ticket_code',
            'bus_tickets.date as date',
            'operators.id as operatorId',
            'operators.operator_name as operatorName',
            'operators.email as email',
            'operators.img as operatorImage'
        )
            ->leftJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->groupBy('bus_tickets.ticket_code')
            ->paginate('6');
        $operators = Operator::get();
        $routes = Routes::get();
        return view('tickets.index', compact('ticketCode', 'operators', 'routes'));
    }

    public function show($code)
    {

        $tickets = BusTicket::select('bus_tickets.*', 'routes.*')
            ->leftJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->where('bus_tickets.ticket_code', $code)
            ->paginate('6');
        // dd($tickets->toArray());
        return view('tickets.show', compact('tickets'));
    }


    public function create($id)
    {

        return view('tickets.create', [
            'routeId' => $id,
            'operators' => Operator::get()
        ]);
    }

    public function store(Request $request)
    {

        $this->validationCheck($request);
        $this->ticketExport($request->totalTicket, $request);

        return redirect()->route('tickets#index');
    }

    public function edit(BusTicket $ticket)
    {
        // dd($ticket->toArray());
        return view('tickets.edit', [
            'locations' => Location::get(),
            'operators' => Operator::get(),
            'data' => $ticket
        ]);
    }

    public function destory(BusTicket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets#index');
    }



    //PRIVATE FUNCTIONS

    private function validationCheck($request)
    {
        $request->validate([
            'totalTicket' => 'required',
            'operatorId' => 'required',
            'date' => 'required',

        ]);
    }

    private function requestData($request)
    {

        return ([
            'date' => $request->date,
            'route_id' => $request->routeId,
            'operator_id' => $request->operatorId,

        ]);
    }

    // private function getRelationData()
    // {
    //     $data = BusTicket::select('bus_tickets.*', 'operators.img', 'operators.operator_name', 'operators.phone1')
    //         ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
    //         ->paginate(4);

    //     return $data;
    // }
    private function ticketExport($amount, $request)
    {

        $ticketCode = rand(1000, 10000);
        $ticketName = 0;
        for ($i = 0; $i < $amount; $i++) {
            $data = $this->requestData($request);
            $data['seat_number'] = 'S-' . $ticketName += 1;
            $data['ticket_code'] =  $ticketCode;
            BusTicket::create($data);
        }
    }
}
