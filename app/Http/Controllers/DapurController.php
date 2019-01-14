<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dapur;
use App\Makanan;

class DapurController extends Controller
{
    public function show($dapur_name){
        $dapur_name = str_replace('-', ' ', $dapur_name);
        $dapur_name = strtoupper($dapur_name);
        
        // data dapur
        $dapur = Dapur::whereRaw("upper(nama) = '". $dapur_name."'")->firstOrFail()->toArray();
        $menus = Makanan::where('id_dapur', $dapur['id'])->get()->toArray();

        $data = [
            'dapur'=> $dapur,
            'menus' => $menus,
        ];
        return view('blog/dapur')->with($data);
    }
}
