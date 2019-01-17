<?php

namespace App\Http\Controllers;

use App\Dapur;
use App\Ongkir;
use App\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function detail($id)
    {
        $makanan = Makanan::where('id', $id)->get()->toArray()[0];
        // $dapur = Dapur::where('id', $makanan['id_dapur'])->pluck('nama')->toArray()[0];
        $dapur = Dapur::where('id', $makanan['id_dapur'])->first()->toArray();
        // dd($dapur);
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
        
        // $dapur = Dapur::where('id', $makanan['id_dapur'])->pluck('lokasi')->toArray()[0];
        $dapur = Dapur::where('id', $makanan['id_dapur'])->get()->toArray()[0];
        // dd($dapur);
        // dd($makanan['id_dapur']);

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
        return view('blog/order')->with($data);
    }

    public function kecamatanAjax(Request $request)
    {
        $dapur = Dapur::where('id', $request->id_dapur)->pluck('lokasi')->toArray()[0];
        $harga = Ongkir::where([
            ['dapur', $dapur],
            ['lokasi', $request->kecamatan]
            ])->pluck('ongkos')->toArray()[0];
        $ongkir = number_format($harga, 0, ",", ".");
        $total = number_format($harga + $request->sub_total, 0, ",", ".");
        $data = [
            'success' => $ongkir,
            'total'   => $total
        ];
        return response()->json($data);
    }

    public function checkout(Request $request)
    {
        
    }
}
