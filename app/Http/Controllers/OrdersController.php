<?php

namespace App\Http\Controllers;

use Mail;
use App\Kue;
use App\Dapur;
use App\Order;
use App\Ongkir;
use App\Makanan;
use App\Minuman;
use Carbon\Carbon;
use App\Helpers\Tanggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        $rand = rand(pow(10, 2-1), pow(10, 2)-1);
        $jenis = strtoupper(substr($request->menu_type, 0, 2));
        $idmenu = substr($request->menu_id, -1);
        $order_number = 'JD'.$now.$nama.$rand.$jenis.$idmenu;

        // Ingredients Code
        $keys = '';
        foreach (Input::get() as $key => $value) {
            $keys .= '.'.$key;
        }
        $matches = array();
        preg_match_all('/.{4}\d+/', $keys, $matches);
        $cocok = [];
        foreach ($matches[0] as $match) {
            array_push($cocok, $match);
        }
        $kode = '';
        foreach ($cocok as $isi) {
            $kode .= $request->$isi . '.';
        }
        $ingredients_code = substr_replace($kode,"",-1);
        
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
        $order->total_price          = $total;
        $order->save();

        // Kirim Email
        try{
            Mail::send('blog/email', [
                'nama'          => $profil->name, 
                'order_number'  => $order_number,
                'delivery_date' => $request->date,
                'total'         => $total
            ], function ($message) use ($profil)
            {
                $message->subject('Tagihan dan Petunjuk Pembayaran - [Jurudapur]');
                $message->from('mail@noreply.jurudapur.com', 'Jurudapur');
                $message->to('avisena.abdillah98@gmail.com');
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
