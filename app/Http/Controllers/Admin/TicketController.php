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
        // $ticketData = $this->getRelationData();

        // return view('tickets.index', [
        //     'locations' => Location::get(),
        //     'operators' => Operator::get(),
        //     'data' => $ticketData
        // ]);
        $data = TicketcodeList::select('ticketcode_lists.*', 'operators.*')
            ->leftJoin('operators', 'operators.id', 'ticketcode_lists.operator_id')
            ->paginate('6');
        return view('tickets.index', [
            'data' => $data,
            'locations' => Location::get(),
            'operators' => Operator::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validationCheck($request);
        $this->ticketExport($request->totalTicket, $request);
        $this->requestData($request);
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
            'toWhere' => 'required',
            'fromWhere' => 'required',
            'operatorId' => 'required',
            'totalTicket' => 'required',
            'price' => 'required',
            'departureTime' => 'required',
            'date' => 'required',
            'class' => 'required'
        ]);
    }

    private function requestData($request)
    {
        return ([
            'from_where' => $request->toWhere,
            'to_where'  => $request->fromWhere,
            'operator_id' => $request->operatorId,
            'price' => $request->price . 'Kyats',
            'date' => $request->date,
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,
            'class' => $request->class,
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
        $operator = Operator::where('id', $request->operatorId)->first();
        $operatorName = $operator->operator_name;
        $ticketCode = rand(1000, 10000);

        //making relation control between tickets and operators
        TicketcodeList::create([
            'ticket_code' => $ticketCode,
            'operator_id' => $request->operatorId
        ]);

        $ticketName = 0;
        for ($i = 0; $i < $amount; $i++) {
            $data = $this->requestData($request);
            $data['seat_number'] = 'S-' . $ticketName += 1;
            $data['ticket_code'] = $ticketCode;
            BusTicket::create($data);
        }
    }
}
