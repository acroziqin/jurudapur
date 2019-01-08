<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanan';

    public function user(){
        return $this->belongsTo('App\Dapur');
    }
}
