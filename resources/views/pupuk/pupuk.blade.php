@extends('layout.master')

@section('isi')
<div class="container py-4">
    <h2 class="mb-4">Daftar Pupuk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($pupuk as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             alt="{{ $item->nama_pupuk }}"
                             class="img-fluid mb-3"
                             style="max-height:200px;object-fit:cover;">

                        <h5 class="card-title">{{ $item->nama_pupuk }}</h5>
                        <p class="card-text mb-4">
                            Jenis : {{ $item->jenis }} <br>
                            Harga : Rp{{ number_format($item->harga,0,',','.') }} <br>
                            Stok  : {{ $item->stok }}
                        </p>

                        <button class="btn btn-primary mt-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#keranjangModal{{ $item->id }}">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>

            {{-- Modal Tambah ke Keranjang --}}
            <div class="modal fade" id="keranjangModal{{ $item->id }}" tabindex="-1"
                 aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('kirim_keranjang') }}" method="POST">
                        @csrf

                        {{-- ===== field tersembunyi yang DIBUTUHKAN validasi ===== --}}
                        <input type="hidden" name="pupuk_id"     value="{{ $item->id }}">
                        <input type="hidden" name="nama_pupuk"   value="{{ $item->nama_pupuk }}">
                        <input type="hidden" name="jenis"        value="{{ $item->jenis }}">
                        <input type="hidden" name="harga_satuan" value="{{ $item->harga }}">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $item->id }}">
                                    Tambah ke Keranjang – {{ $item->nama_pupuk }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama Pupuk</label>
                                    <input type="text" class="form-control"
                                           value="{{ $item->nama_pupuk }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jenis</label>
    <input type="text" class="form-control" name="jenis" value="{{ $item->jenis }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" class="form-control"
                                           name="jumlah" min="1" max="{{ $item->stok }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Harga Satuan (Rp)</label>
                                    <input type="number" class="form-control"
                                           value="{{ $item->harga_satuan }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" class="form-control"
                                           name="supplier" placeholder="Masukkan nama supplier" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                                <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
