<p align="center"><strong>SISTEM INFORMASI PENJUALAN PUPUK ONLINE</strong></p>

<div align="center">

![logo_unsulbar](public/download.jpg)



<b>NUR` AINA</b><br>
<b>D0222052</b><br>
<b>Framework Web Based</b><br>
<b>2025</b>
</div>

---
##  Role dan Fitur-fitur

### 1. Owner (Admin Sistem)
- Melihat seluruh data pengguna dan penjual.
- Menyetujui atau menolak pendaftaran penjual.
- Melihat dan mengelola semua produk yang terdaftar.
- Melihat seluruh transaksi dalam sistem.
- Menghapus akun penjual atau pengguna jika diperlukan.
- Melihat laporan penjualan secara keseluruhan.

---

### 2.  Penjual
- Mengajukan pendaftaran akun penjual.
- Menambahkan, mengedit, dan menghapus produk pupuk.
- Mengatur harga dan stok produk.
- Melihat pesanan dari pengguna.
- Mengubah status pesanan (diproses, dikirim, selesai).
- Melihat laporan penjualan pribadi.

---

### 3. Pengguna (Customer)
- Mendaftar dan login ke sistem.
- Melihat daftar produk pupuk.
- Melakukan pemesanan produk.
- Melihat status dan riwayat pesanan.
- Mengelola informasi akun (nama, alamat, nomor HP, dll).


---
### 1. `users`

| Field       | Tipe Data                        | Keterangan                            |
|-------------|----------------------------------|----------------------------------------|
| id_user     | INT (PK, AUTO_INCREMENT)         | ID unik pengguna                      |
| username    | VARCHAR(50)                      | Nama pengguna                         |
| email       | VARCHAR(100)                     | Email pengguna                        |
| password    | VARCHAR(255)                     | Password (di-hash)                    |
| role        | ENUM('owner','penjual','pengguna') | Peran pengguna dalam sistem           |
| status      | ENUM('aktif','nonaktif','pending') | Status akun (aktif/verifikasi)       |
| created_at  | DATETIME                         | Tanggal pendaftaran                   |

---

### 2.  `produk`

| Field        | Tipe Data              | Keterangan                              |
|--------------|------------------------|------------------------------------------|
| id_produk    | INT (PK, AUTO_INCREMENT) | ID unik produk                         |
| id_penjual   | INT (FK ke `users.id_user`) | ID penjual yang menambahkan produk |
| nama_produk  | VARCHAR(100)           | Nama produk pupuk                        |
| deskripsi    | TEXT                   | Deskripsi produk                         |
| harga        | DECIMAL(10,2)         | Harga satuan produk                      |
| stok         | INT                   | Jumlah stok tersedia                     |
| gambar       | VARCHAR(255)          | URL atau path gambar produk              |
| created_at   | DATETIME              | Tanggal produk ditambahkan               |

---

### 3. `transaksi`

| Field         | Tipe Data              | Keterangan                            |
|---------------|------------------------|----------------------------------------|
| id_transaksi  | INT (PK, AUTO_INCREMENT) | ID unik transaksi                   |
| id_pembeli    | INT (FK ke `users.id_user`) | Pengguna yang melakukan pembelian  |
| tanggal       | DATETIME              | Tanggal transaksi                      |
| total_harga   | DECIMAL(10,2)         | Total harga dari semua item            |
| status        | ENUM('diproses','dikirim','selesai','dibatalkan') | Status pesanan |

---

### 4.  `detail_transaksi`

| Field           | Tipe Data              | Keterangan                           |
|-----------------|------------------------|---------------------------------------|
| id_detail       | INT (PK, AUTO_INCREMENT) | ID detail transaksi                |
| id_transaksi    | INT (FK ke `transaksi.id_transaksi`) | ID transaksi utama          |
| id_produk       | INT (FK ke `produk.id_produk`)       | Produk yang dibeli             |
| jumlah          | INT                   | Jumlah unit yang dibeli               |
| subtotal        | DECIMAL(10,2)         | Harga × jumlah                        |

---


### 5.  `kategori` (opsional)

| Field          | Tipe Data              | Keterangan                           |
|----------------|------------------------|---------------------------------------|
| id_kategori    | INT (PK, AUTO_INCREMENT) | ID kategori                        |
| nama_kategori  | VARCHAR(100)           | Nama kategori (organik, cair, dsb)   |



---
### Daftar Relasi Antar Tabel

| Relasi                           | Jenis Relasi  | Penjelasan                                                                 |
|----------------------------------|---------------|----------------------------------------------------------------------------|
| `users` → `produk`               | One to Many   | Satu penjual dapat memiliki banyak produk.                                 |
| `users` → `transaksi`            | One to Many   | Satu pengguna dapat melakukan banyak transaksi.                            |
| `transaksi` → `detail_transaksi`| One to Many   | Satu transaksi terdiri dari beberapa detail item.                          |
| `produk` → `detail_transaksi`   | One to Many   | Satu produk dapat muncul dalam banyak detail transaksi.                    |
| `kategori` → `produk` *(opsional)* | One to Many | Satu kategori dapat memiliki banyak produk.                                |

---

### Tabel-Tabel yang Saling Berelasi

| Tabel Utama     | Tabel Relasi        | Foreign Key                                   |
|------------------|---------------------|-----------------------------------------------|
| `users`          | `produk`            | `produk.id_penjual` → `users.id_user`         |
| `users`          | `transaksi`         | `transaksi.id_pembeli` → `users.id_user`      |
| `transaksi`      | `detail_transaksi`  | `detail_transaksi.id_transaksi` → `transaksi.id_transaksi` |
| `produk`         | `detail_transaksi`  | `detail_transaksi.id_produk` → `produk.id_produk` |
| `kategori`       | `produk` *(opsional)* | `produk.id_kategori` → `kategori.id_kategori` |

---