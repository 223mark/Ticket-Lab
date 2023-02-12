<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'departure_date',
        'status',
        'seat_number',
        'ticket_code',
        'route_id',
        'operator_id',
        'price'
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'id');
    }
    public function route()
    {
        return $this->belongsTo(Routes::class, 'id');
    }
}
