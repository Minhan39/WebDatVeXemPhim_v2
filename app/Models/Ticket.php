<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'showtime_id',
        'ticket_price_id',
        'voucher_id',
        'gift_id',
        'quantity',
        'seats',
        'combos',
        'payment',
        'reduced_price_by_voucher',
        'reduced_price_by_point',
        'reduced_price_by_gift',
    ];
}
