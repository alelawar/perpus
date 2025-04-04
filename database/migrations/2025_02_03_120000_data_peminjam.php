<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_peminjam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relasi ke tabel users
            $table->foreignId('buku_id')->constrained('data_buku')->onDelete('cascade');  // Relasi ke
            $table->timestamp('tanggal_peminjam')->useCurrent();  // Waktu peminjaman otomatis diisi
            $table->timestamp('tanggal_pengembalian')->nullable();  // Waktu pengembalian, diisi oleh admin
            $table->enum('status', ['belum dikembalikan','belum diambil' ,'telah diambil' ,'sudah dikembalikan'])->default('belum diambil');  // Status peminjaman
            $table->integer('token')->unique();
            $table->timestamps();  // Created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_peminjam');
    }
};
