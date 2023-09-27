<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\EvictBookRequest;
use App\Services\BookingService;

class EvictBookController
{
    public function __construct(private BookingService $service)
    {
    }

    public function __invoke(EvictBookRequest $data)
    {
        $this->service->evict($data);

        return response()->noContent();
    }
}
