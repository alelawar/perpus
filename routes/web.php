<?php

use App\Models\DataBuku;
use Illuminate\Routing\RouteUrlGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/search', function () {
    $books = DataBuku::select('judul', 'penulis', 'cover');

    if (request('s')) {
        $books->where('judul', 'like', '%' . request('s') . '%')->orWhere('penulis', 'like', '%' . request('s') . '%');
    }

    return view('search', [
        'books' => $books->get()
    ]);
});

Route::get('/', function () {
    return view('pages/index', [
        'books' => DataBuku::select('judul', 'penulis', 'cover')->get()
    ])->with('pageTitle', 'Beranda');
})->name('beranda');

Route::get('terbaru', function () {
    return view('pages/terbaru', [
        'books' => DataBuku::select('judul', 'penulis', 'cover')->get()
    ])->with('pageTitle', 'Buku Terbaru');
})->name('buku Terbaru');

Route::get('trending', function () {
    return view('pages/trending', [
        'books' => DataBuku::select('judul', 'penulis', 'cover')->get()
    ])->with('pageTitle', 'Trending');
})->name('trending');

Route::get('wishlist', function () {
    return view('pages/wishlist')->with('pageTitle', 'Wishlist');
})->name('wishlist');


Route::get('usulan', function () {
    return view('pages/usulan')->with('pageTitle', 'Usulan Buku');
})->name('usulan Buku');




Route::get('register', function () {
    return view('register');
});

Route::get('login', function () {
    return view('login');
});

Route::get('viewcard', function () {
    return view('viewCard');
});
