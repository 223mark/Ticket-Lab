<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'status',
        'seat_number',
        'ticket_code',
        'route_id',
        'operator_id'

    ];
}
