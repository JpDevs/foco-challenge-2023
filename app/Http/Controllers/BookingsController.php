<?php

namespace App\Http\Controllers;

use App\Services\BookingsService;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    protected $bookingsService;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $response = null;
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
