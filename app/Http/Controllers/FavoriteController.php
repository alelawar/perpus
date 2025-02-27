<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = auth()->user()->favorites()->with('book')->get();
        return view('user.wishlist', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $request->validate(['book_id' => 'required|exists:data_buku,id']);

        $favorite = Favorite::where('user_id', auth()->id())->where('book_id', $request->book_id)->first();

        if ($favorite) {
            $favorite->delete();
            session()->flash('status', 'Berhasil di hapus dari favorit');
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'book_id' => $request->book_id
            ]);
            session()->flash('status', 'Berhasil menambahkan ke favorit');
        }

        return back();
    }
}
