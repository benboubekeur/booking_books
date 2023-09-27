<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\BookRessource;
use App\Services\BookingService;

class ReservedBooksListController
{
    public function __construct(public BookingService $service)
    {
    }

    public function __invoke()
    {


        return BookRessource::collection($this->service->reservedBooks());
    }
}
