<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
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
