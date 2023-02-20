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
            'operatorId' => $this->operator_id,
            'departureTime' => $this->departure_time,
            'arriveTime' => $this->arrive_time,
            'price' => $this->price,
            'class' => $this->class,
            'operatorName' => $this->operator_name,
            'operatorImg' => 'http://localhost:8000/img/OperatorImage/' . $this->img,


        ];
    }
}
