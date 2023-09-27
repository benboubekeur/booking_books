<?php

namespace App\Http\Requests;

use Spatie\LaravelData\Data;

class EvictBookRequest extends Data
{
    public function __construct(public int $book)
    {
    }

    public static function authorize(): bool
    {
        return true;
    }


    public static function rules(): array
    {
        return [
            'book' => ['required', 'exists:books,isbn']
        ];
    }
}
