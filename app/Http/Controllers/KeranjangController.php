<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Tampilkan isi keranjang
    public function index()
    {
        $keranjang = Keranjang::all();
        return view('keranjang.keranjang_pertama', compact('keranjang'));
    }
    public function tes()
    {
        return view('index');
    }

    // Tambah barang ke keranjang
    public function store(Request $request)
    {
        $request->validate([
            'pupuk_id'     => 'nullable|integer',
            'nama_pupuk'   => 'required|string',
            'jenis'        => 'required|string',
            'jumlah'       => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
            'supplier'     => 'required|string',
        ]);

        keranjang::create([
            'pupuk_id'     => $request->pupuk_id,
            'nama_pupuk'   => $request->nama_pupuk,
            'jenis'        => $request->jenis,
            'jumlah'       => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'supplier'     => $request->supplier,
        ]);

        return redirect()->route('keranjang.index');
    }

    // Hapus barang dari keranjang
    public function destroy($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return redirect()->route('keranjang.index')->with('success', 'Barang berhasil dihapus dari keranjang.');
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

    /**
     * Display the specified resource.
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
