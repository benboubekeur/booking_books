<?php

namespace App\Rules;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class BookIsRentable implements ValidationRule, DataAwareRule
{
    protected array $data;

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $book = Book::isbn($this->data['book'])
            ->rentable($this->data['from'])
            ->first();

        if (is_null($book)) {
            $fail('The book is not rentable.');
        }
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}
