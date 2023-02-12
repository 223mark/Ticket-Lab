<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'ticket_code',
        // 'operator_id',
        'from_where',
        'to_where',
        'class',
        'departure_time',
        'arrive_time'
    ];

    public function tickets()
    {
        return $this->hasMany(BusTicket::class, 'route_id');
    }

    public function scopeFilter($query, array $filters)
    {
        // if ($filters['tag'] ?? false) {
        //     $query->where('tags', 'like', '%' . request('tag') . '%');
        // }

        if ($filters['searchText'] ?? false) {
            $query->where('from_where', 'like', '%' . request('searchText') . '%')
                ->orWhere('to_where', 'like', '%' . request('searchText') . '%')
                ->orWhere('class', 'like', '%' . request('searchText') . '%');
        }
    }
}
