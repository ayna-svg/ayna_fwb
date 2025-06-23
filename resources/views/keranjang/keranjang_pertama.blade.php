@extends('layout.master')

@section('isi')
<div class="container">
    <h2 class="mb-4">Keranjang Belanja</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cek apakah keranjang kosong --}}
    @if($keranjang->isEmpty())
        <div class="alert alert-warning">
            Keranjang Anda masih kosong.
        </div>
    @else
        <div class="row">
            @foreach($keranjang as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            {{-- Jika gambar disimpan di pupuk, bisa diakses via relasi --}}
                            @if($item->pupuk && $item->pupuk->gambar)
                                <img src="{{ asset('storage/' . $item->pupuk->gambar) }}" class="img-fluid mb-3" alt="{{ $item->nama_pupuk }}" style="max-height: 200px;">
                            @endif

                            <h5 class="card-title">{{ $item->nama_pupuk }}</h5>
                            <p class="card-text">
                                Jenis: {{ $item->jenis }}<br>
                                Harga Satuan: Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}<br>
                                Jumlah: {{ $item->jumlah }}<br>
                                Total: <strong>Rp{{ number_format($item->jumlah * $item->harga_satuan, 0, ',', '.') }}</strong><br>
                                Supplier: {{ $item->supplier }}
                            </p>
                            <form method="POST" action="{{ route('keranjang.hapus', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100" onclick="return confirm('Yakin ingin menghapus item ini dari keranjang?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tambahkan ringkasan total seluruh keranjang --}}
        <div class="mt-4">
            <h4>Total Belanja:
                Rp{{ number_format($keranjang->sum(fn($i) => $i->jumlah * $i->harga_satuan), 0, ',', '.') }}
            </h4>
        </div>
    @endif
</div>
@endsection
