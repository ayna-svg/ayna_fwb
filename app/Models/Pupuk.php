<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{

    protected $fillable = ['nama_pupuk', 'deskripsi', 'harga', 'stok', 'gambar'];

    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class, 'pupuk_id');
    }
}