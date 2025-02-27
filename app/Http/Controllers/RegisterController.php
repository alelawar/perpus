<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{

    public function showRegisterForm()
    {
        return view('/auth/register');
    }

    public function register(Request $request)
    {

        // dd($request);
        $validatedData =  $request->validate([
            'fullname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users,username',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'telepon'   => 'required|string|regex:/^[0-9]{10,15}$/|unique:users,telepon',
            'password'  => 'required|string|min:8',
            'alamat'    => 'required|string'
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/auth/login')->with('success', 'Berhasil buat akun!, mohon login');

        return redirect('/auth/login');
    }
}
