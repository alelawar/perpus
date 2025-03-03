<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AdminController extends Controller
{
    use AuthorizesRequests; //PAKE INI PENTING SOALNYA

    /**
     * Display a listing of the resource.
     */

    // YG BISA AKSES DI CONTROLLER CUMA ATMIN
    public function __construct()
    {
        $this->authorize('admin');
    }

    public function index(Request $request)
    {
        $query = DataBuku::latest();

        if ($request->has('s')) {
            $query->where('judul', 'like', '%' . $request->s . '%');
        }

        return view('user.admin.dashboard', [
            'books' => $query->paginate(25)->appends($request->query()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('admin'); <-- BUAT NGECEK YG BISA NGE AKSES FUNGSI CREATE ITU CUMA ATMIN (TPI LAMA)
        return view('user.admin.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:data_buku,slug',
            'penulis' => 'required|string|max:255',
            'cover' => 'required|max:5024',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isbn' => [
                'required',
                'string',
                'size:13',
                'regex:/^\d{13}$/',
                'unique:data_buku,isbn'
            ],
            'halaman' => 'required|integer|min:1',
            'bahasa' => 'required|string|max:100',
            'panjang' => 'required|numeric|min:0', // cm
            'lebar' => 'required|numeric|min:0', // cm
            'berat' => 'required|numeric|min:0', // kg
            'tanggal_terbit' => 'required|date_format:Y-m-d', // YYYY-MM-DD
        ]);

        // dd($validatedData);

        // Pastikan cover dikirim, lalu simpan di storage/public/cover_buku
        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('cover_buku', 'public');
        }

        DataBuku::create($validatedData);

        return redirect('/dashboard')->with('success', 'Buku baru berhasil ditambahkan!');       
    }

    /**
     * Display the specified resource.
     */
    public function show(DataBuku $dataBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataBuku $dataBuku)
    {
        return view('user.admin.edit', [
            "title" => "Create Page",
            "book" => $dataBuku,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataBuku $dataBuku)
    {

        $rules = [
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'cover' => 'nullable|max:5024',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'halaman' => 'required|integer|min:1',
            'bahasa' => 'required|string|max:100',
            'panjang' => 'required|numeric|min:0', // cm
            'lebar' => 'required|numeric|min:0', // cm
            'berat' => 'required|numeric|min:0', // kg
            'tanggal_terbit' => 'required|date_format:Y-m-d', // YYYY-MM-DD
        ];


        if ($request->slug != $dataBuku->slug) {
            $rules['slug'] = 'required|unique:data_buku,slug,' . $dataBuku->id;
        }
        
        if ($request->isbn != $dataBuku->isbn) {
            $rules['isbn'] = 'required|unique:data_buku,isbn,' . $dataBuku->id;
        }

        $validatedData = $request->validate($rules);


        if($request->file('cover')) {
            if($request->oldCover) {
                Storage::delete($request->oldCover);
            }
            $validatedData['cover'] = $request->file('cover')->store('cover_buku', 'public');
        }

        // dd($validatedData);

        $dataBuku->update($validatedData);

        return redirect('/dashboard')->with('success', 'Data buku berhasil diperbarui!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataBuku $dataBuku)
    {
        if($dataBuku->cover) {
            Storage::delete($dataBuku->cover);
        }
        DataBuku::destroy($dataBuku->id);

        return redirect('/dashboard')->with('success', 'Data buku berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(DataBuku::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
