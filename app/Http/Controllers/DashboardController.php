<?php

namespace App\Http\Controllers;

use App\Kue;
use App\Dapur;
use App\Order;
use App\Makanan;
use App\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $profil = Auth::user();

        // Verified
        if (Auth::check()) {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }

        $orders = Order::where('user_id', $profil->id)->get()->toArray();
        
        $menu_dapur = [];
        // [[Paket A, Bu Sri],
        //  [Paket B, Bu Sri],
        //  [Paket A, Bu Rini]]
        foreach ($orders as $key => $value) {
            $mendap = [];
            if ($orders[$key]['menu_type'] == 'makanan') {
                $menu_type = Makanan::where('id', $orders[$key]['menu_id'])->get()->toArray()[0];
                $menu = $menu_type['nama'];
            } elseif ($orders[$key]['menu_type'] == 'minuman') {
                $menu_type = Minuman::where('id', $orders[$key]['menu_id'])->get()->toArray()[0];
                $menu = $menu_type['nama'];
            } else {
                $menu_type = Kue::where('id', $orders[$key]['menu_id'])->get()->toArray()[0];
                $menu = $menu_type['nama'];
            }
            $dapur = Dapur::where('id', $menu_type['id_dapur'])->pluck('nama')->toArray()[0];
            // dd($menu);
            array_push($mendap, $menu);
            array_push($mendap, $dapur);
            array_push($menu_dapur, $mendap);
        }
        // dd($menu_dapur);

        $data = [
            'cek_password' => NULL,
            'verified' => $verified,
            'orders' => $orders,
        ];
        return view('blog/dashboard')->with($data);
    }
}