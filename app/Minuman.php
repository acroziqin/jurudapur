<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    protected $table = 'minuman';

    protected $fillable = ['kode_product', 'nama', 'harga', 'jenis', 'id_dapur','foto'];
    // public function user(){
    //     return $this->belongsTo('App\Dapur');
    // }

    public function dapur()
    {
        return $this->belongsTo(Dapur::class, 'id_dapur', 'id');
    }
}
