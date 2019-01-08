<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dapur extends Model
{
    protected $table = 'dapur';
    
    public function makanan(){
        return $this->hasMany('App\Makanan');
    }
}
