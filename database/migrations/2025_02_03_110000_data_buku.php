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
            // $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            // $table->unsignedBigInteger('category_id');
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'buku_categories_id'
            );
            $table->string('judul');
            $table->string('slug');
            $table->string('penulis');
            $table->string('cover')->nullable();
            $table->string('penerbit');
            // $table->integer('harga');
            $table->text('deskripsi');
            $table->integer('token')->nullable();
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
