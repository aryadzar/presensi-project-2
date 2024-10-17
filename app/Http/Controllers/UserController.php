<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda memiliki model User

class UserController extends Controller
{
    // Menampilkan form tambah user
    public function create()
    {
        return view('dashboard_admin.user.create'); // Menampilkan view form tambah user
    }

    // Menyimpan data user baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'NPM' => 'required|numeric|unique:users,NPM',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'asal_instansi' => 'required|string|max:255',
        ]);

        // Menyimpan data user
        User::create([
            'NPM' => $request->NPM,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'asal_instansi' => $request->asal_instansi,
        ]);

        return redirect()->route('user.create')->with('success', 'User berhasil ditambahkan');
    }
}
