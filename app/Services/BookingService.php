<?php

namespace App\Services;

use App\Http\Requests\EvictBookRequest;
use App\Http\Requests\RentingRequest;
use App\Models\Book;

class BookingService
{
    public function rent(RentingRequest $data): void
    {
        $book = Book::find($data->book);

        $book->rent($data->from, $data->to, $data->user);
    }

    public function evict(EvictBookRequest $data): void
    {
        $book = Book::find($data->book);

        $book->evict();
    }
}
