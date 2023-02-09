<?php

namespace App\Http\Controllers\Api\V1;

//use App\Filter\V1\TicketFilter;
use App\Models\Routes;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TicketResource;
use App\Http\Resources\V1\TicketCollection;
use App\Filter\V1\TicketFilter;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $ticket = $this->busTicket();
        //filtering
        $filter = new TicketFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new TicketCollection($ticket);
        } else {
            $ticket = Routes::select('bus_tickets.*', 'routes.*', 'operators.*', 'bus_tickets.id as ticket_id')
                ->rightJoin('bus_tickets', 'routes.id', 'bus_tickets.route_id')
                ->rightJoin('operators', 'operators.id', 'bus_tickets.operator_id')
                ->where($queryItems)
                ->get();
            return new TicketCollection($ticket);
        }
    }

    private function busTicket()
    {
        $ticket = Routes::select('bus_tickets.*', 'routes.*', 'operators.*', 'bus_tickets.id as ticket_id')
            ->leftJoin('bus_tickets', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->get();
        return $ticket;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BusTicket $ticket)
    {
        //
        $ticketId = $ticket->id;
        $ticket = Routes::select('bus_tickets.*', 'routes.*', 'operators.*', 'bus_tickets.id as ticket_id')
            ->leftJoin('bus_tickets', 'routes.id', 'bus_tickets.route_id')
            ->leftJoin('operators', 'operators.id', 'bus_tickets.operator_id')
            ->where('bus_tickets.id', $ticketId)
            ->first();


        return new TicketResource($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
