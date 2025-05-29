@extends('layout.master')

@section('isi')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-center">Penjualan Pupuk</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($pupuks as $pupuk)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
            <img src="{{ asset('storage/' . $pupuk->gambar) }}" alt="{{ $pupuk->nama }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold">{{ $pupuk->nama }}</h2>
                <p class="text-sm text-gray-600">{{ Str::limit($pupuk->deskripsi, 80) }}</p>
                <div class="mt-3">
                    <p class="text-green-700 font-bold">Rp{{ number_format($pupuk->harga, 0, ',', '.') }}</p>
                    <p class="text-gray-500 text-sm">Stok: {{ $pupuk->stok }}</p>
                </div>
                <button class="mt-4 w-full bg-green-600 text-white py-2 rounded-xl hover:bg-green-700 transition">Beli</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
