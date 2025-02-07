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
           'category_id' => Category::factory(),
           'penulis' => fake()->unique()->sentence(4, false),
           'penerbit' => fake()->unique()->sentence(4, false),
            'deskripsi' => fake()->unique()->paragraph(4, false),
        ];
    }
}
