<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\RentingRequest;
use App\Services\BookingService;

class BookingController
{

    public function __construct(private BookingService $service)
    {
    }

    public function __invoke(RentingRequest $request)
    {

        $this->service->book();

        return response()->noContent();
    }
}
