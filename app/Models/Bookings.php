<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasTimestamps;

    protected $table = 'bookings';

    protected $fillable = [
        'id',
        'booking_code',
        'booking_holder',
        'holder_phone',
        'holder_email',
        'adults',
        'kids',
        'check-in',
        'check-out',
        'status'
    ];

}
