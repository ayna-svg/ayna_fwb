<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\Pembelian;
use App\Models\keranjang;
use Illuminate\Support\Facades\Storage;

class PupukController extends Controller
{
    // Menampilkan 4 data pupuk untuk halaman penjualan
    public function index()
    {
        $pupuk = Pupuk::all(); 
        return view('pupuk.pupuk', compact('pupuk'));
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
            'nama_pupuk' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar ke storage
        $gambarPath = $request->file('gambar')->store('pupuk', 'public');

        // Simpan data ke database
        Pupuk::create([
            'nama_pupuk' => $request->nama_pupuk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarPath,
        ]);

        return redirect('/')->with('success', 'Data pupuk berhasil disimpan.');
    }

    public function store_pembelian(Request $request) {
        $pupuk = Pupuk::findOrFail($request->pupuk_id);
        $pupuk->stok += $request->jumlah;
        $pupuk->save();
    
        Pembelian::create([
            'nama_pupuk' => $request->nama_pupuk,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'supplier' => $request->supplier,
        ]);
    
        return back()->with('success', 'Pembelian berhasil dan stok diperbarui');
    }

    public function keranjang_store(Request $request)
    {
        // Validasi data sesuai struktur tabel keranjangs
        // dd($request->all());
        $request->validate([
            'pupuk_id'     => 'required|integer|exists:pupuks,id',
            'nama_pupuk'   => 'required|string|max:255',
            'jenis'        => 'required|string|max:255',
            'jumlah'       => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
            'supplier'     => 'required|string|max:255',
        ]);

        // Simpan data ke tabel keranjangs
        keranjang::create([
            'pupuk_id'     => $request->pupuk_id,
            'nama_pupuk'   => $request->nama_pupuk,
            'jenis'        => $request->jenis,
            'jumlah'       => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'supplier'     => $request->supplier,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect('/')->with('success', 'Pupuk berhasil ditambahkan ke keranjang.');
    }
}