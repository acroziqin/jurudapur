<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanan';

    protected $fillable = ['kode_produk', 'nama', 'kode_isi', 'harga', 'jenis', 'id_dapur'];
    // public function user(){
    //     return $this->belongsTo('App\Dapur');
    // }
}
