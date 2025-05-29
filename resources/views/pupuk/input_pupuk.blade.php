@extends('layout.master')

@section('isi')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Tambah Data Pupuk</h2>
    <form action="{{ route('kirim_pupuk') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Nama Pupuk</label>
            <input type="text" name="nama" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 rounded" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Harga</label>
            <input type="number" name="harga" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Stok</label>
            <input type="number" name="stok" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Gambar</label>
            <input type="file" name="gambar" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
    </form>
</div>
@endsection
