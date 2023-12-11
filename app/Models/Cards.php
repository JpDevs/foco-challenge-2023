<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasTimestamps;
    
    protected $table = 'cards';

    public function booking()
    {
        return $this->belongsTo(Bookings::class, 'booking_id', 'id');
    }
}
