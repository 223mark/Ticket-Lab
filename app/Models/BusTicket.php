<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'operator_id',
        'date',

        'status',
        'seat_number',
        'ticket_code',

    ];
}
