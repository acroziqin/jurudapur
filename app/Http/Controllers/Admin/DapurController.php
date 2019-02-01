<?php

namespace App\Http\Controllers\Admin;

use App\Dapur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DapurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dapur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dapur = new Dapur();
        return view('admin.full_form_dapur')->with(['dapur'=>$dapur, 'button'=>"Tambah Dapur"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'       => 'required|max:255',
            'alamat'       => 'required|string',
            'deskripsi'  => 'nullable|string',
            'kuota'      => 'required|integer',
            'lokasi'      => 'required|exists:ongkir,dapur',
            'foto'      => 'image',
            'foto_header'      => 'image',
        ]);
        $filenametostore1 = '';
        $filenametostore2 = '';
        if ($request->hasFile('foto')) {
            $file1 = $request->file('foto');
            $extension1 = $file1->getClientOriginalExtension();
            $filenametostore1 = date('Y-m-d._H-i').'_'.uniqid().'.'.$extension1;
            Storage::put('public/uploads/img/dapur/'. $filenametostore1, fopen($file1, 'r+'));
            //Resize image here
            $imgpath = public_path('storage/uploads/img/dapur/'.$filenametostore1);
            Image::make($imgpath)->resize(null, 512, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->crop(512, 512)->save($imgpath, 80);
        }
        if($request->hasFile('foto_header')){
            $file2 = $request->file('foto_header');
            $extension2 = $file2->getClientOriginalExtension();
            $filenametostore2 = date('Y-m-d._H-i').'_'.uniqid().'.'.$extension2;
            Storage::put('public/uploads/img/dapur/header/'. $filenametostore2, fopen($file2, 'r+'));
            $headerpath = public_path('storage/uploads/img/dapur/header/'.$filenametostore2);
            Image::make($headerpath)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $item_array = [
            'nama'       => $request->nama,
            'alamat'       => $request->alamat,
            'deskripsi'  => $request->deskripsi,
            'kuota'      => $request->kuota,
            'lokasi'      => $request->lokasi,
        ];
        if(!empty($filenametostore1))
            $item_array['foto'] = $filenametostore1;
        
        if(!empty($filenametostore2))
            $item_array['foto_header'] = $filenametostore2;
        
        $dapur = Dapur::create($item_array);
        return redirect()->route('admin.dapur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dapur  $dapur
     * @return \Illuminate\Http\Response
     */
    public function show(Dapur $dapur)
    {
        return view('admin.full_form_dapur')->with(['dapur'=>$dapur, 'button'=>"Close"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dapur  $dapur
     * @return \Illuminate\Http\Response
     */
    public function edit(Dapur $dapur)
    {
        return view('admin.full_form_dapur')->with(['dapur'=>$dapur, 'button'=>"Update"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dapur  $dapur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dapur $dapur)
    {
        // 'nama'       => $request->nama,
        //     'alamat'       => $request->alamat,
        //     'deskripsi'  => $request->deskripsi,
        //     'kuota'      => $request->kuota,
        //     'lokasi'      => $request->lokasi,
        $dapur->nama      = $request->nama;
        $dapur->alamat    = $request->alamat;
        $dapur->deskripsi = $request->deskripsi;
        $dapur->kuota     = $request->kuota;
        $dapur->lokasi    = $request->lokasi;

        $filenametostore1 = '';
        $filenametostore2 = '';
        if ($request->hasFile('foto')) {
            $file1 = $request->file('foto');
            $extension1 = $file1->getClientOriginalExtension();
            $filenametostore1 = date('Y-m-d._H-i').'_'.uniqid().'.'.$extension1;
            Storage::put('public/uploads/img/dapur/'. $filenametostore1, fopen($file1, 'r+'));
            //Resize image here
            $imgpath = public_path('storage/uploads/img/dapur/'.$filenametostore1);
            Image::make($imgpath)->resize(null, 512, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->crop(512, 512)->save($imgpath, 80);
        }
        if($request->hasFile('foto_header')){
            $file2 = $request->file('foto_header');
            $extension2 = $file2->getClientOriginalExtension();
            $filenametostore2 = date('Y-m-d._H-i').'_'.uniqid().'.'.$extension2;
            Storage::put('public/uploads/img/dapur/header/'. $filenametostore2, fopen($file2, 'r+'));
            $headerpath = public_path('storage/uploads/img/dapur/header/'.$filenametostore2);
            Image::make($headerpath)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        if(!empty($filenametostore1)){
            Storage::delete([
                'public/uploads/img/dapur/'.$dapur->foto,
            ]);
            $dapur->foto = $filenametostore1;
        }
        
        if(!empty($filenametostore2)){
            Storage::delete([
                'public/uploads/img/dapur/header/'.$dapur->foto_header,
            ]);
            $dapur->foto_header = $filenametostore2;
        }

        $dapur->save();
        return redirect()->route('admin.dapur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dapur  $dapur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dapur $dapur)
    {
        Storage::delete([
            'public/uploads/img/dapur/'.$dapur->foto,
            'public/uploads/img/dapur/header/'.$dapur->foto_header,
        ]);
        $dapur->delete();
    }

    public function dapurs()
    {
        $dapur = Dapur::query();
        return DataTables::eloquent($dapur)
            ->addColumn('action', function($dapur){
                return view('admin._action_dapur', [
                    'title'       => $dapur->nama,
                    'url_edit'    => route('admin.dapur.edit', $dapur->id),
                    'url_destroy' => route('admin.dapur.destroy', $dapur->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
