<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function update(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        // $image = $request->file('select_file');
        // $nama_foto = random() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path("images"), $new_name);

        $profil = Auth::user()->id;
        // $profil->name = $request->name; 
        // $profil->foto = $request->foto; 
        dd($request->foto);
        return view('blog/dashboard');
    }
}
