<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Models\Operator;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Models\TicketcodeList;
use App\Http\Controllers\Controller;

class TicketCodeController extends Controller
{

    //ticketcodes
    public function index()
    { {

            $data = TicketcodeList::select('ticketcode_lists.*', 'operators.*')
                ->leftJoin('operators', 'operators.id', 'ticketcode_lists.operator_id')
                ->paginate('6');
            return view('ticketsCode.index', [
                'data' => $data,
                'locations' => Location::get(),
                'operators' => Operator::get(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->requestedData($request);

        TicketcodeList::create($data);
        return redirect()->route('ticketCode#index');
    }


    //
    public function filterbyTicketcode($ticketCode)
    {

        $data = BusTicket::where('ticket_code', $ticketCode)->paginate('6');
        return view('tickets.ticket', [
            'data' => $data
        ]);
    }

    //PRIVATE FUNCTIONS

    private function validationCheck($request)
    {
        $request->validate([
            'toWhere' => 'required',
            'fromWhere' => 'required',
            'operatorId' => 'required',
            'price' => 'required',
            'departureTime' => 'required',
            'class' => 'required'
        ]);
    }
    private function requestedData($request)
    {
        $ticketCode = rand(1000, 10000);
        return ([
            'to_where' => $request->toWhere,
            'from_where' => $request->fromWhere,
            'operator_id' => $request->operatorId,
            'price' => $request->price . 'ks',
            'departure_time' => $request->departureTime,
            'arrive_time' => $request->arriveTime,
            'class' => $request->class,
            'ticket_code' => $ticketCode
        ]);
    }
}
