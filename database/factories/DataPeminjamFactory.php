<?php

namespace Database\Factories;

use App\Models\DataBuku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataPeminjamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Membuat user baru atau ambil dari seeder
            'buku_id' => DataBuku::factory(), // Membuat buku baru atau ambil dari seeder
            'tanggal_peminjam' => now(), // Waktu peminjaman saat ini
            'tanggal_pengembalian' => $this->faker->optional(0.5)->dateTimeBetween('+3 days', '+14 days'), // 50% kemungkinan diisi
            'status' => $this->faker->randomElement(['belum dikembalikan', 'sudah dikembalikan']), // Pilih status secara acak
        ];
    }
}
