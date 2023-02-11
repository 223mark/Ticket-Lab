<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupByTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //  return parent::toArray($request);
        return [
            'ticketCode' => $this->ticket_code,
            'fromWhere' => $this->from_where,
            'toWhere' => $this->to_where,
            // 'date' => $this->date,
            'departureTime' => $this->departure_time,
            'arriveTime' => $this->arrive_time,
            'price' => $this->price,
            'class' => $this->class,
            'operatorName' => $this->operator_name

            //         seatNumber	"S-1"
            // ticketCode	"9370"
            // status	null
            // date	"2023-02-06 00:00:00"
            // routeId	1
            // formWhere	"Yangon"
            // toWhere	"Mandalay"
            // price	"35000Ks"
            // ticketClass	"vip"
            // departureTime	"3:00 AM"
            // arriveTime	"9:00 PM"
            // operatorId	1
            // operatorName	"Tet Nay Lin Express"
            // phone1	97845
            // phone2	96355
            // operatorEmail	"admin@gmail.com"
        ];
    }
}
