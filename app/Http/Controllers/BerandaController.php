<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Makanan;
use App\Dapur;

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

        $nasibungkus = Makanan::where('jenis', 'Nasi Bungkus')->get();
        $dapur_nasbung = [];
        foreach ($nasibungkus as $nasbung) {
            $dapur = Dapur::where('id', $nasbung->id_dapur)->pluck('nama')->toArray();
            array_push($dapur_nasbung, $dapur[0]);
        }
        if (Auth::check())
        {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }

        $data = [
            'characteristics' => $characteristics,
            'nasibungkus' => $nasibungkus,
            'dapnasbung' => $dapur_nasbung,
            'verified' => $verified
        ];
        return view('blog/home')->with($data);
    }
}
