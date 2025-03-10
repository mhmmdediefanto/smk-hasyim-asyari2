<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AgendaFactory extends Factory
{
    protected $model = Agenda::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {

        return [
            'user_id' => 1, // Sesuaikan dengan jumlah user di database
            'image' => fake()->imageUrl(),
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'tanggal_mulai' => fake()->date(),
            'tanggal_selesai' => fake()->date(),
            'penyelenggara' => fake()->company(),
            'tempat' => fake()->city(),
            'body' => fake()->paragraphs(3, true),
        ];
    }
}
