<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\BookingRequest;
use App\Services\BookingService;

class BookingController
{

    public function __construct(private BookingService $service)
    {
    }

    public function __invoke(BookingRequest $request)
    {
        dd('sssssss');
        $this->service->book();

        return response()->noContent();
    }
}
