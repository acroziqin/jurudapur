<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function update(Request $request)
    {   
        $profil     = Auth::user();
        // $nama_foto  = Auth::user()->foto;
        // $nama = Auth::user()->name;
        if (!empty($request->foto)) {
            $this->validate($request, [
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            // $image = $request->file('foto');
            // $nama_foto = Auth::user()->id . '.' . $image->getClientOriginalExtension();
            // $image->move(asset('images'), $nama_foto);
            // dd($request->file('foto')->store('avatars'));
            $path = $request->file('foto')->store('public/avatars');
            $profil->foto = basename($path);
            // dd(basename($path));
        }
        if (!empty($request->name)) {
            $profil->name = $request->name;
        }
        if (!empty($request->alamat)) {
            $profil->alamat = $request->alamat;
        }
        if (!empty($request->no_hp)) {
            $profil->no_hp = $request->no_hp;
        }
        if (!empty($request->jenis_kelamin)) {
            $profil->jenis_kelamin = $request->jenis_kelamin;
        }
        $profil->save();

        return back();
    }
}
