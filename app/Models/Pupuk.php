<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    protected $table = 'pupuks';
    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok', 'gambar'];
}
