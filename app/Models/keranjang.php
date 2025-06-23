<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjangs';

    protected $fillable = [
        'pupuk_id',
        'nama_pupuk',
        'jenis',
        'jumlah',
        'harga_satuan',
        'supplier',
    ];

    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class, 'pupuk_id');
    }
}
