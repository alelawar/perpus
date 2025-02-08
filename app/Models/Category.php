<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $table = 'categories'; // Nama tabel, jika tidak mengikuti konvensi Laravel
    public $timestamps = false; // Menonaktifkan timestamp

    public function books()
    {
        return $this->hasMany(DataBuku::class, 'category_id');
    }
}
