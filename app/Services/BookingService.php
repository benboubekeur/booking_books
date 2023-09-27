<?php

namespace App\Services;

use App\Http\Requests\EvictBookRequest;
use App\Http\Requests\RentingRequest;
use App\Models\Book;
use Illuminate\Support\Collection;

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

    public function reservedBooks(): Collection
    {
        return Book::query()
            ->with(['rentor', 'author'])
            ->rented()
            ->get();
    }
}
