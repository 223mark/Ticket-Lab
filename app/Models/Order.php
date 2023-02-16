<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ticket_id',
        //'operator_id',
        'cancel_status',
        'customer_email',
        'customer_name',
        'customer_nrc_number',
        'payment_method',
        'departure_date'
    ];

    public function tickets()
    {
        return $this->belongsTo(BusTicket::class, 'id');
    }
}
