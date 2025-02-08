<?php

use App\Models\DataBuku;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',[
        'books' => DataBuku::select('judul', 'penulis', 'cover')->get()
    ] );
});