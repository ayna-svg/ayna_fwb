<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';

    protected $fillable = [
        'nama_pupuk',
        'jenis',
        'jumlah',
        'harga_satuan',
        'supplier',
    ];

    /**
     * Relasi ke model Pupuk
     */
    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class);
    }

    /**
     * Hitung total harga pembelian
     */
    public function getTotalHargaAttribute()
    {
        return $this->jumlah * $this->harga_satuan;
    }
}
