<?php

namespace App\Http\Controllers;

use App\Isi;
use App\Kue;
use App\Dapur;
use App\Ongkir;
use App\Makanan;
use App\Minuman;
use App\IsiMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function detail($jenis_menu, $id)
    {

        if ($jenis_menu == 'makanan') {
            $menu = Makanan::where('id', $id)->get()->toArray()[0];
        } else if ($jenis_menu == 'minuman') {
            $menu = Minuman::where('id', $id)->get()->toArray()[0];
        } else {
            $menu = Kue::where('id', $id)->get()->toArray()[0];
        }

        $dapur = Dapur::where('id', $menu['id_dapur'])->first()->toArray();
        $isi = ' ';
        if ($jenis_menu == 'makanan') {
            $kodeIsi = ' ';
            $kode_isi = null;

            for ($i=0; $i < strlen($menu['kode_isi']); $i++) {
                if ($menu['kode_isi'][$i] == 1) {
                    $kode_isi = '+';
                } else {
                    $kode_isi = '/';
                }
                $kodeIsi = $kodeIsi . $kode_isi;
            }

            $isi_makanan = IsiMakanan::where('id_makanan', $id)->get()->toArray();

            for ($i=0; $i < count($isi_makanan); $i++) { 
                $isi = $isi . ' ' . $kodeIsi[$i] . ' ' . Isi::where('id', $isi_makanan[$i]['id_isi'])->pluck('nama')->toArray()[0];
            }
        }

        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }
        
        $data = [
            'jenis_menu' => $jenis_menu,
            'menu' => $menu,
            'dapur' => $dapur,
            'verified' => $verified,
            'isi' => trim($isi)
        ];
        return view('blog/product')->with($data);
    }

    public function order($jenis_menu, $id)
    {
        if ($jenis_menu == 'makanan') {
            $menu = Makanan::where('id', $id)->get()->toArray()[0];
        } else if ($jenis_menu == 'minuman') {
            $menu = Minuman::where('id', $id)->get()->toArray()[0];
        } else {
            $menu = Kue::where('id', $id)->get()->toArray()[0];
        }

        $dapur = Dapur::where('id', $menu['id_dapur'])->get()->toArray()[0];

        $isi = [];
        $inputType = null;
        if ($jenis_menu == 'makanan') {
            $isi_makanan = IsiMakanan::where('id_makanan', $id)->get()->toArray();
            for ($i=0; $i < count($isi_makanan); $i++) { 
                array_push($isi, Isi::where('id', $isi_makanan[$i]['id_isi'])->pluck('nama')->toArray()[0]);
            }
            
            //1
            // kode isi = 1 0  11
            // inp type = x 00 xx

            //5
            // kode isi = 1 0  1 1 1 0  1
            // inp type = x 00 x x   11 x

            //21
            // kode isi = 0  1 000000000  1 000  1 000
            // inp type = 00   1111111111   2222   3333

            // kode isi = 0
            // inp type = 00

            $input_type = null;
            $j = 0;
            for ($i=0; $i < strlen($menu['kode_isi']); $i++) {
                if ($menu['kode_isi'][$i] == 1) {
                    if (is_null($inputType)) {
                        $input_type = 'x';
                    // } elseif(substr($inputType, -1) == 'x') {
                    //     // dd($inputType);
                    //     $input_type = 'x';
                    } else {
                        $input_type = 'x';
                    }
                } else {
                    // Jika ada angka dan akhirnya berupa x, maka hapus char terakhir
                    if (preg_match('/[0-9]/', $inputType) && substr($inputType, -1) == 'x') {
                        $inputType = substr($inputType, 0, -1);
                        // dd($inputType);
                    // } elseif (substr($inputType, -1) != 'x') {
                        // $input_type = $j . $j;
                    // } else {
                        $j++;
                    }
                    if (substr($inputType, -1) != $j || is_null($inputType) || substr($inputType, -1) == 'x') {
                    // if (preg_match('/[0-9]/', $inputType) && substr($inputType, -1) != 'x') {
                        $input_type = $j . $j;
                    } else {
                        $input_type = $j;
                    }
                }
                $inputType = $inputType . $input_type;
            }
        }
        // dd($inputType);

        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }

        $data = [
            'jenis_menu' => $jenis_menu,
            'menu' => $menu,
            'dapur' => $dapur,
            'verified' => $verified,
            'isi' => $isi,
            'input_type' => $inputType
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
        // "isix0" => "Nasi Putih"
        // "isio0" => "Tumis Tempe"
        // "isix3" => "Sayur"
        // "isix4" => "Sambal"
        // "kuantitas" => "20"
        // "date" => "10:15 - 15/01/2019"
        // "payment" => "cod"
        // "lokasi-ketemuan" => "Jl. Mawar"
        // "shipment" => "antar"
        // "kecamatan" => "Blimbing"
        dd($request);
    }
}
