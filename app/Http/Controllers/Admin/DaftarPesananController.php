<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DaftarPesananController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pesanan');
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $user = $order->user;
        $menu = $order->menu;
        $dapur = $order->menu->dapur;
        $data = [
            'order' => $order,
            'user' => $user,
            'menu' => $menu,
            'dapur' => $dapur,
        ];
        return view('admin._form-show-pesanan', compact('data'));
    }
    public function markasdone($id)
    {
        $order = Order::findOrFail($id);
        $order->isdone = true;
        $order->save();
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }

    public function pesanan()
    {
        $order = Order::query();
        return DataTables::eloquent($order)
            ->addColumn('action', function($order){
                return view('admin._action-pesanan', [
                    'order'          => $order,
                    'isdone'         => $order->isdone,
                    'url_markasdone' => route('admin.pesanan.markasdone', $order->id),
                    'url_show'       => route('admin.pesanan.show', $order->id),
                    'url_destroy'    => route('admin.pesanan.delete', $order->id),
                ]);
            })
            ->addColumn('user', function ($order) {
                return $order->user->toArray();
            })
            ->addColumn('menu', function ($order) {
                return $order->menu->toArray();
            })
            ->addColumn('dapur', function ($order) {
                return $order->menu->dapur->toArray();
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
