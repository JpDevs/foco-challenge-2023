<?php

namespace App\Repositories;

use App\Models\Bookings;

class BookingsRepository
{
    public function all()
    {
        return Bookings::orderBy('id','desc')->get();
    }

    public function find(int $id)
    {
        return Bookings::where('id', $id)->firstOrFail();
    }

    public function findByCode(string $code)
    {
        return Bookings::where('code', $code)->firstOrFail();
    }


}
