<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        // dd(Auth::user());
        return view('user.profile_edit', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        // dd($request->all()); // Tampilkan data request

        // Validasi data yang diterima
        $request->validate([
            'fullname' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5400',
            'telepon' => 'required|string|regex:/^[0-9]{10,15}$/|unique:users,telepon,' . Auth::id(),
            'alamat' => 'required|string'
        ]);

        // Cek apakah request memiliki file profile
        if ($request->hasFile('profile')) {
            //Simpan file di storage/public/profile
            $profile = $request->file('profile')->store('profile', 'public');

            // Hapus foto lama jika ada
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            $user->profile = $profile;
        }



        // Update data user
        $user->update([
            'fullname' => $request->fullname,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);


        return redirect()->route('profile.update')->with('success', 'Profile Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
