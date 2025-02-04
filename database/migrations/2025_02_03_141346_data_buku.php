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
        Schema::create('data_buku', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('category_id')->constrained('category_buku')->onDelete('cascade');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('harga');
            $table->text('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_buku');  // Hapus tabel data_buku jika rollback
    }
};
