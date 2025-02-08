<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    /** @use HasFactory<\Database\Factories\DataBukuFactory> */
    use HasFactory;
    protected $table = 'data_buku'; // Nama tabel, jika tidak mengikuti konvensi Laravel
    public $timestamps = false; // Menonaktifkan timestamp

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(DataPeminjam::class, 'buku_id');
    }

}
