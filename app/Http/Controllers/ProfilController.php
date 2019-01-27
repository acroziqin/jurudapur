<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function update(Request $request)
    {   
        $profil  = Auth::user();

        // Password
        $cek_password = NULL;
        if ($request->password != $request->password_confirmation) {
            $data = [
                'cek_password' => 'Password tidak sama'
            ];
            // return view('blog/dashboard')->with($data);
            return back()->with($data);
        }
        $profil->password = bcrypt($request->password);
        
        // Foto
        if (!empty($request->foto)) {
            $this->validate($request, [
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $path = $request->file('foto')->store('public/avatars');
            $profil->avatar = basename($path);
        }

        // Nama
        if (!empty($request->name)) {
            $profil->name = $request->name;
        }

        // Alamat
        if (!empty($request->alamat)) {
            $profil->alamat = $request->alamat;
        }

        // Nomor HP
        if (!empty($request->no_hp)) {
            $profil->no_hp = $request->no_hp;
        }

        // Jenis Kelamin
        if (!empty($request->jenis_kelamin)) {
            $profil->jenis_kelamin = $request->jenis_kelamin;
        }
        
        $profil->save();

        return back();
    }
}
