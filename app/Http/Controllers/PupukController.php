<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use Illuminate\Support\Facades\Storage;

class PupukController extends Controller
{
    // Menampilkan 4 data pupuk untuk halaman penjualan
    public function index()
    {
        $pupuks = Pupuk::all(); 
        return view('pupuk.pupuk', compact('pupuks'));
    }

    // Menampilkan form input pupuk
    public function create()
    { 
        return view('pupuk.input_pupuk');
    }

    // Menyimpan data pupuk ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar ke storage
        $gambarPath = $request->file('gambar')->store('pupuk', 'public');

        // Simpan data ke database
        Pupuk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('pupuk')->with('success', 'Data pupuk berhasil ditambahkan.');
    }
}
