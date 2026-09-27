<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|uppercase',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama harus diisi!',
            'name.min' => 'Nama minimal 3 karakter!',
            'name.max' => 'Nama maksimal 50 karakter!',
            'name.uppercase' => 'Nama harus menggunakan huruf besar semua!',

            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Format email tidak valid!',

            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 6 karakter!',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok!',
        ]);

        return "Data berhasil divalidasi!";
    }
}