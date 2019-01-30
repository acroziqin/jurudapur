<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard-admin');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function pesanan()
    {
        return view('admin.pesanan');
    }
}
