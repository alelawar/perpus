<?php

use App\Models\DataBuku;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',[
        'books' => DataBuku::select('judul', 'penulis', 'cover')->get()
    ] );
});

Route::get('/search', function() {
    $books = DataBuku::select('judul', 'penulis', 'cover');

    if(request('s')) {
        $books->where('judul', 'like' , '%'. request('s') .'%' )->orWhere('penulis', 'like' , '%'. request('s') .'%');
    }

    return view('search', [
        'books' => $books->get()
    ]);
});