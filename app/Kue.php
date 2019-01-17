<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kue extends Model
{
    protected $table = 'kue';

    protected $fillable = ['kode_produk', 'nama', 'harga', 'jenis', 'id_dapur'];

}
