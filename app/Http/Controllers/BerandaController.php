<?php

namespace App\Http\Controllers;

use App\Kue;
use App\Dapur;
use App\Makanan;
use App\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characteristics = [
            'icon' => ['utensils', 'medal', 'user-shield', 'user-tie'],
            'name' => ['Ahlinya dapur', 'Kualitas Terbaik', 'Terpercaya', 'Profesional']
        ];

        $makanan = Makanan::limit(10)->get();
        $dapur_makanan = [];
        foreach ($makanan as $makan) {
            $dapur = Dapur::where('id', $makan->id_dapur)->pluck('nama')->toArray();
            array_push($dapur_makanan, $dapur[0]);
        }
        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }

        $minuman = Minuman::limit(10)->get();
        $dapur_minuman = [];
        foreach ($minuman as $minum) {
            $dapur = Dapur::where('id', $minum->id_dapur)->pluck('nama')->toArray();
            array_push($dapur_minuman, $dapur[0]);
        }
        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }

        $kue = Kue::limit(10)->get();
        $dapur_kue = [];
        foreach ($kue as $kuwe) {
            $dapur = Dapur::where('id', $kuwe->id_dapur)->pluck('nama')->toArray();
            array_push($dapur_kue, $dapur[0]);
        }
        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }

        $data = [
            'characteristics' => $characteristics,
            'makanan' => $makanan,
            'dapmakanan' => $dapur_makanan,
            'minuman' => $minuman,
            'dapminuman' => $dapur_minuman,
            'kue' => $kue,
            'dapkue' => $dapur_kue,
            'verified' => $verified
        ];
        return view('blog/home')->with($data);
    }
}
