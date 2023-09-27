<?php

namespace App\Http\Requests;

use App\Rules\BookIsRentable;
use Spatie\LaravelData\Data;

class RentingRequest extends Data
{
    public function __construct(public
                                int           $user,
                                public int    $book,

                                public string $from,
                                public string $to)
    {
    }


    public static function authorize(): bool
    {
        return true;
    }


    public static function rules(): array
    {
        return [
            'user' => ['required', 'exists:users,id'],
            'book' => ['required', 'exists:books,isbn'],
            'from' => ['required', 'date', 'date_format:Y-m-d',],
            'to' => ['required', 'date', 'date_format:Y-m-d', 'after:from', new BookIsRentable()],
        ];
    }
}
