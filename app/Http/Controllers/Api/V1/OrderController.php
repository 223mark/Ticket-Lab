<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\V1\OrderResource;
use App\Http\Requests\V1\StoreOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request  $request)
    {
        //change  dateform from request 
        $date = Carbon::createFromFormat('d/m/Y', $request->departureDate)->format('Y-m-d');

        $orderData = [
            'customer_name' => $request->name,
            'customer_nrc_number' =>  $request->customerNrc,
            'payment_method' => $request->paymentMethod,
            'departure_date' =>  $date,
            'ticket_id' => $request->ticketId,
            'customer_email' => $request->email,
            'operator_id' => $request->operatorId,
            'created_at' => Carbon::now()->format('Y-m-d')
        ];
        // logger($orderData);

        //Mail::to('fake@mail.com')->send(new OrderMail());
        return new OrderResource(Order::create($orderData));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
