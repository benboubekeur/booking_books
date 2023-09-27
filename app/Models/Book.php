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
    protected $fillable = ['rented_until', 'rented_from', 'rented_by'];

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

    public function rent(string $from, string $to, int $user): void
    {
        $this->update([
            'rented_from' => $from,
            'rented_until' => $to,
            'rented_by' => $user
        ]);
    }
}
