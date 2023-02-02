<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusTicket;
use App\Models\Location;
use App\Models\Operator;
use App\Models\TicketcodeList;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function index()
    {

        $tickets = BusTicket::select('ticketcode_lists.*', 'bus_tickets.*')
            ->leftJoin('ticketcode_lists', 'ticketcode_lists.ticket_code', 'bus_tickets.ticket_code')
            ->paginate('6');

        return view('tickets.index', [
            'tickets' => $tickets,

        ]);
    }

    public function create($code)
    {

        return view('tickets.create', [
            'ticketCode' => $code
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
            'date' => 'required',

        ]);
    }

    private function requestData($request)
    {
        return ([
            'date' => $request->date,
            'ticket_code' => $request->ticketCode

        ]);
    }

    private function getRelationData()
    {
        $data = BusTicket::select('bus_tickets.*', 'operators.img', 'operators.operator_name', 'operators.phone1')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->paginate(4);

        return $data;
    }
    private function ticketExport($amount, $request)
    {

        $ticketName = 0;
        for ($i = 0; $i < $amount; $i++) {
            $data = $this->requestData($request);
            $data['seat_number'] = 'S-' . $ticketName += 1;
            BusTicket::create($data);
        }
    }
}
