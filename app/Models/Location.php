<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
    ];

    // public function route()
    // {
    //     return $this->belongsTo(Routes::class, 'location');
    // }
    public function scopeFilter($query, array $filters)
    {
        // if ($filters['tag'] ?? false) {
        //     $query->where('tags', 'like', '%' . request('tag') . '%');
        // }

        if ($filters['searchText'] ?? false) {
            $query->where('location', 'like', '%' . request('searchText') . '%');
        }
    }
}
