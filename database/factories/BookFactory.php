<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

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

    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'isbn' => $this->faker->isbn13(),
            'description' => $this->faker->paragraph(),
            'genre' => $this->faker->randomElement(['Fiction', 'Non-fiction', 'Sci-Fi', 'Romance']),
            'publication_year' => $this->faker->year(),
            'price' => $this->faker->randomFloat(2, 100, 999),
            'cover_image' => $this->faker->imageUrl(200, 300, 'books', true),
        ];
    }
}
