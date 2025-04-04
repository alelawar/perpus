<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataBuku;
use App\Models\DataPeminjam;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests; //PAKE INI PENTING SOALNYA


    public function index(Request $request)
    {
        $query = DataPeminjam::with('buku');

        // Cek apakah ada pencarian berdasarkan token
        if ($request->has('s')) {
            $query->where('token', 'like', '%' . $request->s . '%');
        }
    
        return view('user.admin.dataPin', [
            'pinjaman' => $query->paginate(10)->appends($request->query())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        // Validasi data dari form
        $validated = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'buku_id'  => 'required|exists:data_buku,id',
        ]);

        // Tambahkan data tambahan otomatis
        $validated['tanggal_dipinjam'] = Carbon::now();
        $validated['tanggal_pengembalian'] = Carbon::now()->addDays(30);
        $validated['status'] = 'belum diambil';
        // Generate token unik
        do {
            $token = random_int(100000, 999999);
        } while (DataPeminjam::where('token', $token)->exists());

        $validated['token'] = $token;

        // dd($validated);

        $peminjaman = DataPeminjam::create($validated);

        return redirect("/user/pinjaman/detail/{$peminjaman->token}")
            ->with('success', 'Buku berhasil dipinjam!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Ambil data buku berdasarkan slug dari DataBuku
        $book = DataBuku::where('slug', $slug)->firstOrFail();
        return view('user.pinjam', [
            'title' => 'Pinjam Buku',
            'book'  => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPeminjam $dataPeminjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPeminjam $dataPeminjam)
    {
        $this->authorize('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPeminjam $dataPeminjam)
    {
        //
    }

    public function pinjamanUpdate(Request $request)
    {
        // Cek apakah user adalah admin
        $this->authorize('admin');

        // Validasi request
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:data_peminjam,id',
            'status' => 'required|array',
        ]);

        // Update status untuk setiap data yang dipilih
        foreach ($request->ids as $id) {
            DataPeminjam::where('id', $id)->update(['status' => $request->status[$id]]);
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui untuk beberapa data.');
    }

    public function pinjamanDelete(Request $request)
    {
        // Validasi
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:data_peminjam,id',
        ]);

        // Hapus data berdasarkan ID yang dipilih
        DataPeminjam::whereIn('id', $request->ids)->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
