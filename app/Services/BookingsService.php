<?php

namespace App\Services;

use App\Constants\BookingConstants;
use App\Models\Bookings;
use App\Repositories\BookingsRepository;
use Illuminate\Support\Facades\DB;

class BookingsService
{
    protected BookingsRepository $bookingsRepository;

    public function __construct(BookingsRepository $bookingsRepository)
    {
        $this->bookingsRepository = $bookingsRepository;
    }

    public function getAllBookings(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->bookingsRepository->all();
    }

    public function getBookingById(int $id)
    {
        return $this->bookingsRepository->find($id);
    }

    public function getBookingByCode(string $code)
    {
        return $this->bookingsRepository->findByCode($code);
    }

    public function createBooking(array $data)
    {
        return DB::transaction(function () use ($data) {
            return Bookings::create($data);
        });
    }

    public function createBookingByFile($file)
    {
        $data = $this->convertXml($file);

        return $this->createBooking($data);
    }

    public function convertXml($file): array
    {
        $xml = file_get_contents($file);
        $xml = simplexml_load_file($file);

        if (!$xml->Bookings) {
            throw new \Exception('No booking detected');
        }
        $data = [];
        foreach ($xml->Bookings as $booking) {
            $status = constant("App\Constants\BookingConstants::" . strtoupper($booking->Booking['status'])) ?? BookingConstants::PENDING;
            $data['booking_code'] = $booking->Booking['id'];
            $data['booking_holder'] = "{$booking->Booking->PrimaryGuest->Name['givenName']} {$booking->Booking->PrimaryGuest->Name['surname']}";
            $data['holder_email'] = $booking->Booking->PrimaryGuest->Email;
            $data['holder_phone'] = "{$booking->Booking->PrimaryGuest->Phone['countryCode']} {$booking->Booking->PrimaryGuest->Phone['cityAreaCode']} {$booking->Booking->PrimaryGuest->Phone['number']}";
            $data['adults'] = $booking->Booking->RoomStay->GuestCount['adult'];
            $data['kids'] = $booking->Booking->RoomStay->GuestCount['child'];
            $data['check-in'] = $booking->Booking->RoomStay->StayDate['arrival'];
            $data['check-out'] = $booking->Booking->RoomStay->StayDate['departure'];
            $data['status'] = $status;
        }
        return $data;
    }

    public function updateBooking(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            return Bookings::where('id', $id)->firstOrFail()->update($data);
        });
    }

    /**
     * @throws \Exception
     */
    public function updateBookingByFile($file, $id)
    {
        $data = $this->convertXml($file);
        return $this->updateBooking($id, $data);
    }
}
