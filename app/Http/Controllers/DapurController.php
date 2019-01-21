<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dapur;
use App\Makanan;
use App\Minuman;
use App\Kue;

class DapurController extends Controller
{
    public function show($dapur_name){
        $dapur_name = str_replace('-', ' ', $dapur_name);
        $dapur_name = strtoupper($dapur_name);
        
        // data dapur
        $dapur = Dapur::whereRaw("upper(nama) = '". $dapur_name."'")->firstOrFail();
        $makanan = Makanan::where('id_dapur', $dapur->id)->get()->toArray();
        $minuman = Minuman::where('id_dapur', $dapur->id)->get()->toArray();
        $kue = Kue::where('id_dapur', $dapur->id)->get()->toArray();
        $data = [
            'dapur'   => $dapur,
            'makanans' => $makanan,
            'minumans' => $minuman,
            'kues'     => $kue,
        ];
        return view('blog/dapur', $data);
    }
}
