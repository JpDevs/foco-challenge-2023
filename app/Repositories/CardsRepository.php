<?php

namespace App\Repositories;

use App\Models\Cards;

class CardsRepository
{
    public function all()
    {
        return Cards::all();
    }

    public function find(int $id)
    {
        return Cards::where('id', $id)->firstOrFail();
    }

    public function findByBooking(int $booking_id)
    {
        return Cards::where('booking_id', $booking_id)->firstOrFail();
    }
}
