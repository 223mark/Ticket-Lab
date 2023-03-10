<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $fillable = [
        'operator_name',
        'phone1',
        'phone2',
        'email',
        'description',
        'img'
    ];

    public function tickets()
    {
        return $this->hasMany(BusTicket::class);
    }

    public function scopeFilter($query, array $filters)
    {

        if ($filters['searchText'] ?? false) {
            $query->where('operator_name', 'like', '%' . request('searchText') . '%')
                ->orWhere('email', 'like', '%' . request('searchText') . '%');
        }
    }
}
