<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->isbn,
            'title' => $this->title,
            'publishedAt' => $this->published_at,
            'rentedFrom' => $this->rented_from,
            'rentedUntil' => $this->rented_until,
            'rentor' => new RentorRessource($this->rentor),
            'author' => new AuthorRessource($this->author),


        ];
    }
}
