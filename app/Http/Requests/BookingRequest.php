<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(): array

    {
        return [
            'book' => ['required', 'exists:books,isbn'],
            'user' => ['required', 'exists:users,id'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],

        ];
    }
}
