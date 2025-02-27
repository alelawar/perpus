<?php

use App\Models\DataBuku;
use GuzzleHttp\Middleware;
use App\Models\DataPeminjam;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\RouteUrlGenerator;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('pages/index', [
        'books' => DataBuku::select('id','judul', 'slug' ,'penulis', 'cover')->paginate(15)
    ])->with('pageTitle', 'Beranda');
})->name('beranda');

Route::get('/search', function () {
    $books = DataBuku::select('judul', 'penulis', 'cover');

    if (request('s')) {
        $books->where('judul', 'like', '%' . request('s') . '%')->orWhere('penulis', 'like', '%' . request('s') . '%');
    }

    return view('search', [
        'books' => $books->get()
    ]);
});


Route::get('terbaru', function () {

    return view('pages/terbaru', [
        'books' => DataBuku::select('judul', 'penulis', 'cover')->latest()->take(10)->get()
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


Route::get('view/{buku:slug}', function (DataBuku $buku) {
    return view('viewCard', ["buku" => $buku]);
});

// register routes
Route::get('/auth/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

// login routes
Route::get('auth/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('auth/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// account routes
Route::get('/user', function () {
    return view('user.profile');
})->middleware('auth');

Route::get('/user/pinjaman', function () {
    return view('user.pinjaman', [
        "pinjaman" => DataPeminjam::with('buku')->where('user_id', auth()->user()->id)->latest()->get()
    ]);
})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/user/wishlist', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/user/wishlist/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::delete('/user/wishlist/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});

