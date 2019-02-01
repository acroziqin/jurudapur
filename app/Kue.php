<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kue extends Model
{
    protected $table = 'kue';

    protected $fillable = ['kode_produk', 'nama', 'harga', 'jenis', 'id_dapur','foto'];

    public function dapur()
    {
        return $this->belongsTo(Dapur::class, 'id_dapur', 'id');
    }
}
