<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Makanan;
use App\Kue;
use App\Minuman;
use App\Dapur;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd($request);
        $query = Input::get('query');
        $type  = Input::get('type');
        $result = [];
        $_COOKIE['filter'] = Input::get('filter','');
        if($query != ''){
            if($type == 'dapur'){
                $dapurs = Dapur::where('nama','LIKE',"%$query%")->get()->toArray();
                $result = array_merge($result, $dapurs);
            }else{
                if(Input::get('filter','') != ''){
                    if(Input::get('filter','')=='')
                        Input::get('filter','') == $_COOKIE['filter'];
                    if(strpos(Input::get('filter'), 'makanan') !== false){
                        $makanans = Makanan::where('nama', 'LIKE', "%$query%")->get()->toArray();
                        $result = array_merge($result, $makanans);
                    }
                    if(strpos(Input::get('filter'), 'minuman') !== false){
                        $minumans = Minuman::where('nama', 'LIKE', "%$query%")->get()->toArray();
                        $result = array_merge($result, $minumans);
                    }
                    if(strpos(Input::get('filter'), 'kue') !== false){
                        $kues = Kue::where('nama', 'LIKE', "%$query%")->get()->toArray();
                        $result = array_merge($result, $kues);
                    }
                }else{
                    $makanans = Makanan::where('nama', 'LIKE', '%'.$query.'%')->get()->toArray();
                    // $makanans = Makanan::where('nama', 'LIKE', "%$query%")->get()->toArray();
                    $minumans = Minuman::where('nama', 'LIKE', '%'.$query.'%')->get()->toArray();
                    $kues = Kue::where('nama', 'LIKE', '%'.$query.'%')->get()->toArray();
                    $result = array_merge($result, $makanans, $minumans, $kues);
                }
            }
        }
        $data = ['result' => $result, 'searchAsMenu' => $type != 'dapur'];
        return view('blog.search', $data);
    }
}
