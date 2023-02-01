<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketcodeList extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_code',
        'operator_id'
    ];
}
