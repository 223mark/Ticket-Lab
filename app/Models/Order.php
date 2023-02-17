<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

        'ticket_id',
        'operator_id',
        //'operator_id',
        // 'cancel_status',
        'customer_email',
        'customer_name',
        'customer_nrc_number',
        'payment_method',
        'departure_date'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('departure_date', 'like', '%' . request('tag') . '%')
                ->orWhere('payment_method', 'like', '%' . request('tag') . '%');
        }

        if ($filters['searchText'] ?? false) {
            $query->where('title', 'like', '%' . request('searchText') . '%')
                ->orWhere('description', 'like', '%' . request('searchText') . '%')
                ->orWhere('tags', 'like', '%' . request('searchText') . '%');
        }
    }

    // public function bustickets()
    // {
    //     return $this->belongsTo(BusTicket::class,);
    // }
}
