<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dapur extends Model
{
    protected $table = 'dapur';
    
    protected $fillable = [
        'nama',
        'alamat',
        'deskripsi',
        'kuota',
        'lokasi',
        'foto',
        'foto_header',
    ];

    public function makanan(){
        return $this->hasMany('App\Makanan');
    }
}
