<?php

namespace App\Http\Controllers;

use App\Dapur;
use App\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function detail($id)
    {
        $makanan = Makanan::where('id', $id)->get()->toArray()[0];
        $dapur = Dapur::where('id', $makanan['id_dapur'])->pluck('nama')->toArray()[0];
        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }
        
        $data = [
            'makanan' => $makanan,
            'dapur' => $dapur,
            'verified' => $verified
        ];
        return view('blog/product')->with($data);
    }

    public function order($id)
    {
        $makanan = Makanan::where('id', $id)->get()->toArray()[0];
        $dapur = Dapur::where('id', $makanan['id_dapur'])->pluck('nama')->toArray()[0];
        // dd($makanan['id_dapur']);
        $data = [
            'makanan' => $makanan,
            'dapur' => $dapur
        ];
        return view('blog/order')->with($data);
    }
}
