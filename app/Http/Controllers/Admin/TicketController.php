<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Routes;
use App\Models\Location;
use App\Models\Operator;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    //
    public function index()
    {

        $ticketCode = BusTicket::select(
            'routes.*',
            'bus_tickets.ticket_id as busticketId',
            'bus_tickets.ticket_code as ticket_code',
            'operators.id as operatorId',
            'operators.operator_name as operatorName',
            'operators.email as email',
            'operators.img as operatorImage'
        )
            ->leftJoin('routes', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->groupBy('bus_tickets.ticket_code')
            ->latest()
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

        return view('tickets.showAllTickets', compact('tickets'));
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

        return redirect()->route('tickets#index')->with('addMessage', 'Ticket Added Successfully..');
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

    public function destory($ticketCode)
    {
        $relatedTickets = BusTicket::where('ticket_code', $ticketCode)->get();

        for ($i = 0; $i < count($relatedTickets); $i++) {
            BusTicket::where('ticket_code', $ticketCode)->first()->delete();
        }
        // $relatedTickets->delete();

        return redirect()->route('tickets#index')->with('deleteMessage', 'Tickets deleted successfully..');
    }



    //PRIVATE FUNCTIONS

    private function validationCheck($request)
    {
        $request->validate([
            'totalTicket' => 'required',
            'operatorId' => 'required',
            //  'date' => 'required',
            'price' => 'required'

        ]);
    }

    private function requestData($request)
    {


        return ([

            //  'departure_date' => $request->date,
            'route_id' => $request->routeId,
            'operator_id' => $request->operatorId,
            'price' => $request->price . 'Ks',
            'class' => $request->ticketClass,

        ]);
    }


    private function ticketExport($amount, $request)
    {

        $ticketCode = rand(10000, 100000);
        $ticketName = 0;
        for ($i = 0; $i < $amount; $i++) {
            $data = $this->requestData($request);
            $data['seat_number'] = 'S-' . $ticketName += 1;
            $data['ticket_code'] =   $ticketCode;
            BusTicket::create($data);
        }
    }
}
