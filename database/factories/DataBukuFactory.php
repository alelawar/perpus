<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {;
        return [
           'judul' => fake()->unique()->sentence(4, false),
           'slug' => fake()->unique()->slug(4, false),
           'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
           'penulis' => fake()->unique()->name(),
           'cover' => null,
           'penerbit' => fake()->unique()->sentence(4, false),
            'deskripsi' => fake()->unique()->paragraph(4, false),
        ];
    }
}
