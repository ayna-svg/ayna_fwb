@extends('layout.master')

@section('isi')
<div class="container">
    <h2>Form Pembelian Pupuk dari Supplier</h2>
    <form action="{{ route('kirim_pembelian') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_pupuk" class="form-label">Nama Pupuk</label>
            <input type="text" name="nama_pupuk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" class="form-control">
                <option value="Organik">Organik</option>
                <option value="Kimia">Kimia</option>
                <option value="Cair">Cair</option>
                <option value="Padat">Padat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah (satuan)</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="harga_satuan" class="form-label">Harga Satuan (Rp)</label>
            <input type="number" name="harga_satuan" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label for="supplier" class="form-label">Nama Supplier</label>
            <input type="text" name="supplier" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pembelian</button>
    </form>
</div>
@endsection
