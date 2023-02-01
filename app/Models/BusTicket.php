<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'operator_id',
        'from_where',
        'to_where',
        'price',
        'date',
        'departure_time',
        'arrive_time',
        'status',
        'seat_number',
        'ticket_code',
        'class'
    ];
}
