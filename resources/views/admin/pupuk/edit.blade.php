<!DOCTYPE html>
<html>
<head>
    <title>Edit Pupuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Pupuk</h2>
    <form action="{{ route('pupuk.update', $pupuk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pupuk" class="form-label">Nama Pupuk</label>
            <input type="text" class="form-control" name="nama_pupuk" value="{{ $pupuk->nama_pupuk }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <input type="text" class="form-control" name="jenis" value="{{ $pupuk->jenis }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="{{ $pupuk->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="{{ $pupuk->stok }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pupuk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
