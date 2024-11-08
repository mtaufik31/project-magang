<?php

namespace Database\Factories;

use App\Models\Manga;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manga>
 */
class MangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Manga::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'alternative' => $this->faker->words(3, true),
            'image' => 'https://via.placeholder.com/300x400?text=Manga+Image',
            'status' => $this->faker->randomElement(['ongoing', 'complete']),
            'rating' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->paragraph(),
            'released_year' => $this->faker->year(),
            'author' => $this->faker->name(),
            'artist' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'created_by' => User::factory(),
            'genre' => json_encode($this->faker->words(3)),
        ];
    }
}
