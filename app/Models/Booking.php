<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'customer_id',
        'departure_from',
        'arriving_at',
        'departure_date',
        'return_date',
        'passengers',
        'cabin_class',
        'travel_type',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return BelongsToMany
     */
    public function passenger(): BelongsToMAny
    {
        return $this->belongsToMany(Passenger::class);
    }


    /**
     * @return BelongsToMany
     */
    public function flight(): BelongsToMAny
    {
        return $this->belongsToMany(Flight::class);
    }
}
