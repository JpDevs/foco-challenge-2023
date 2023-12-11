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
        'holder_document',
        'holder_phone',
        'holder_email',
        'adults',
        'kids',
        'payment_method',
        'check-in',
        'check-out',
        'status'
    ];

    public function cards()
    {
        return $this->hasMany(Bookings::class, 'booking_id', 'id');
    }

}
