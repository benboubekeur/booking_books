<?php

namespace App\Http\Requests;

use App\Rules\BookIsRentable;
use Illuminate\Foundation\Http\FormRequest;

class RentingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user' => ['required', 'exists:users,id'],
            'book' => ['required', 'exists:books,isbn'],
            'from' => ['required', 'date', 'date_format:Y-m-d',],
            'to' => ['required', 'date', 'date_format:Y-m-d', 'after:from', new BookIsRentable()],
        ];
    }
}
