<?php

namespace App\Http\Controllers;

use Mail;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Makanan;
use App\Minuman;
use App\Kue;
use App\Ongkir;
use App\Dapur;

class OrdersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profil  = Auth::user();
        $this->validate($request, [
            'no_hp' => 'required',
            'date' => 'required',
            'lokasi_ketemuan' => 'required',
            'shipment' => 'required',
        ]);

        // Order Number
        $now = Carbon::now()->format('ymd');
        if (strlen($profil->name) > 1) {
            $name = $profil->name;
        } else {
            $name = $profil->name.'Z';
        }
        $nama = strtoupper(substr($name, 0, 2));
        $hp = substr($request->no_hp, -2);
        $jenis = strtoupper(substr($request->menu_type, 0, 2));
        $idmenu = substr($request->menu_id, -1);
        $order_number = 'JD'.$now.$nama.$hp.$jenis.$idmenu;

        // Ingredients Code
        $a = '';
        for ($i=0; $i < 5; $i++) { 
            $a .= '.'.$request->isi.$i;
        }
        $keys = '';
        foreach (Input::get() as $key => $value) {
            $keys .= '.'.$key;
        }
        $matches = array();
        preg_match_all('/\d+./', $keys, $matches);
        $cocok = '';
        foreach ($matches[0] as $match) {
            $cocok .= $match;
        }
        $ingredients_code = substr_replace($cocok,"",-1);

        // Create new Order
        $order = new Order;
        $order->user_id              = $profil->id;
        $order->menu_type            = $request->menu_type;
        $order->menu_id              = $request->menu_id;
        $order->order_number         = $order_number;
        $order->ingredients_code     = $ingredients_code;
        $order->quantity             = $request->kuantitas;
        $order->phone_number         = $request->no_hp;
        $order->delivery_date        = $request->date;
        $order->payment_method       = $request->payment;
        $order->payment_location     = $request->lokasi_ketemuan;
        $order->shipment_method      = $request->shipment;
        $order->shipment_subdistrict = $request->kecamatan;
        $order->shipment_location    = $request->alamat_lengkap;
        $order->total_price          = $request->total_price;
        $order->save();
        
        $subTotal = 0;
        $total = 0;
        $ongkir = 0;
        $menu;
        if($request->menu_type == 'makanan'){
            $menu = Makanan::where('id',$request->menu_id)->first();
            $subTotal = $request->kuantitas * $menu->harga;
        }else if($request->menu_type == 'minuman'){
            $menu = Minuman::where('id',$request->menu_id)->first();
            $subTotal = $request->kuantitas * $menu->harga;
        }else if($request->menu_type == 'kue'){
            $menu = Kue::where('id',$request->menu_id)->first();
            $subTotal = $request->kuantitas * $menu->harga;
        }

        if($request->shipment == 'antar'){
            $dapur = Dapur::find($menu->id_dapur)->first();
            $ongkir = Ongkir::where([
                        ['dapur','=', $dapur->lokasi],
                        ['lokasi','=', $request->kecamatan]
                    ])->first();
            $ongkir = $ongkir->ongkos;
            $total = $subTotal + $ongkir;

        }else{
            $total = $subTotal;
        }

        // Kirim Email
        try{
            Mail::send('blog/email', [
                'nama'          => $profil->name, 
                'order_number'  => $order_number,
                // 'delivery_date' => $request->date,
                // 'total_price'   => $request->total_price
            ], function ($message) use ($profil)
            {
                $message->subject('Tagihan dan Petunjuk Pembayaran - [Jurudapur]');
                $message->from('mail@noreply.jurudapur.com', 'Jurudapur');
                $message->to('achmadchoirurroziqin@gmail.com');
            });
            return view('blog.selesai_order', [
                'order'    => $order,
                'harga'    => $menu->harga,
                'antar'    => $request->shipment == 'antar',
                'ongkir'   => $ongkir,
                'subTotal' => $subTotal,
                'total'    => $total,
                'menu'     => $menu
            ]);
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
