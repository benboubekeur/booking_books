<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'isbn';

    public function scopeRentable($query, $from)
    {
        info($from);
        return $query->whereNull('rented_from')
            ->orWhereDate('rented_until', '<=', $from);
    }

    public function scopeIsbn($query, $isbn)
    {
        return $query->where('isbn', $isbn);
    }

}
