<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'root_id',
        'cinema_id',
        'name',
        'price',
        'is_active',
        'is_always_available',
        'unit_id'
    ];
}
