<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->ticket_id,
            'seatNumber' => $this->seat_number,
            'ticketCode' => $this->ticket_code,
            'status' => $this->status,
            'date' => $this->date,
            'routeId' => $this->route_id,
            'formWhere' => $this->from_where,
            'toWhere' => $this->to_where,
            'price' => $this->price,
            'ticketClass' => $this->class,
            'departureTime' => $this->departure_time,
            'arriveTime' => $this->arrive_time,
            'operatorId' => $this->operator_id,
            'operatorName' => $this->operator_name,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'operatorEmail' => $this->email,
        ];
    }
}
