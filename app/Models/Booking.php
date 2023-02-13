<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_from',
        'arriving_at',
        'departure_date',
        'return_date',
        'passengers',
        'cabin',
        'one_way',
        'round_trip'
    ];
}
