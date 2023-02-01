<?php

namespace App\Http\Controllers\Admin;

use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Models\TicketcodeList;
use App\Http\Controllers\Controller;

class TicketCodeController extends Controller
{

    //tickets
    public function ticketCode($id)
    {

        $data = TicketcodeList::select('operators.*', 'ticketcode_lists.*')
            ->rightJoin('operators', 'ticketcode_lists.operator_id', 'operators.id')
            ->where('operator_id', $id)
            ->paginate('6');

        return view('operators.tickets.ticketCodeTable', [
            'data' => $data
        ]);
    }

    //
    public function filterbyTicketcode($ticketCode)
    {

        $data = BusTicket::where('ticket_code', $ticketCode)->paginate('6');
        return view('tickets.ticket', [
            'data' => $data
        ]);
    }
}
