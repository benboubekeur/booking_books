<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => $this->faker->unique()->isbn13(),
            'title' => $this->faker->name(),
            'published_at' => $this->faker->date(),
            'author_id' => Author::factory()->create()->id

        ];
    }

    public function rented(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'rented_by' => User::factory()->create()->id,
                'rented_from' => now(),
                'rented_until' => now()->addMonth(),
            ];
        });
    }
}
