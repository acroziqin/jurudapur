<?php

namespace App\Http\Controllers;

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
        if (Auth::check()) {
            $verified = Auth::user()->email_verified_at;
        }else {
            $verified = NULL;
        }
        $data = [
            'cek_password' => NULL,
            'verified' => $verified,
        ];
        return view('blog/dashboard')->with($data);
    }
}