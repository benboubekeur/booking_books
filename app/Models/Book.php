<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'isbn';
    protected $fillable = ['rented_until', 'rented_from', 'rented_by'];

    public function scopeRentable($query, $from)
    {
        return $query->whereNull('rented_from')
            ->orWhereDate('rented_until', '<=', $from);
    }

    public function scopeIsbn($query, $isbn)
    {
        return $query->where('isbn', $isbn);
    }

    public function scopeRented($query)
    {
        return $query->whereNotNull('rented_by');
    }

    public function rent(string $from, string $to, int $user): void
    {
        $this->update([
            'rented_from' => $from,
            'rented_until' => $to,
            'rented_by' => $user
        ]);
    }

    public function evict(): void
    {
        $this->update([
            'rented_from' => null,
            'rented_until' => null,
            'rented_by' => null
        ]);
    }

    public function rentor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'rented_by');
    }

    public function author(): HasOne
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }
}
