<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'limit_total_expenditure',
        'description',
        'value',
        'unit_id',
    ];
}
