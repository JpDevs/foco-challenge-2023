<?php

namespace App\Http\Controllers;

use App\Constants\BookingConstants;
use App\Services\BookingsService;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    protected $bookingsService;
    protected $rules = [
        'booking_holder' => ['string', 'required'],
        'holder_phone' => ['string'],
        'holder_email' => ['string'],
        'adults' => ['integer'],
        'kids' => ['integer'],
        'check-in' => ['date'],
        'check-out' => ['date'],
        'status' => ['integer']
    ];

    public function __construct(BookingsService $bookingsService)
    {
        $this->bookingsService = $bookingsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $response = $this->bookingsService->getAllBookings();
            return $this->setResponse($response);

        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return $this->setResponse([
            'status' => [
                BookingConstants::PENDING => 'pending',
                BookingConstants::CONFIRMED => 'confirmed',
                BookingConstants::RETRIEVED => 'retrieved',
                BookingConstants::CANCEL => 'cancel',
            ]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $this->validated();
            return $this->bookingsService->createBooking($validated);

        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    public function storeFile(Request $request)
    {
        try {
            if (!$request->xml) {
                throw new \Exception('Xml file is required');
            }
            $response = $this->bookingsService->createBookingByFile($request->xml);
            return $this->setResponse($response, 201);
        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = $this->bookingsService->getBookingById($id);
            return $this->setResponse($response);
        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $response['booking'] = $this->bookingsService->getBookingById($id);
            $response['status'] = [
                BookingConstants::PENDING => 'pending',
                BookingConstants::CONFIRMED => 'confirmed',
                BookingConstants::RETRIEVED => 'retrieved',
                BookingConstants::CANCEL => 'cancel',
            ];
            return $this->setResponse($response);
        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $this->validated();
            $response = $this->bookingsService->updateBooking($id, $validated);
            return $this->setResponse($response);
        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    public function updateFile(Request $request, $id)
    {
        try {
            if (!$request->xml) {
                throw new \Exception('Xml file is required');
            }
            $response = $this->bookingsService->updateBookingByFile($request->xml, $id);
            return $this->setResponse($response);
        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->bookingsService->deleteBooking($id);
            return $this->setResponse(null, 204);
        } catch (\Exception $e) {
            return $this->setError($e);
        }
    }
}
