<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    protected $model = \App\Models\Berita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'kategori_berita_id' => fake()->numberBetween(1, 14),
            'image' => fake()->imageUrl(),
            'excerpt' => fake()->text(100),
            'body' => fake()->paragraphs(5, true),
        ];
    }
}
