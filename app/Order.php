<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 
        'user_id', 
        'menu_type', 
        'menu_id', 
        'order_number', 
        'ingredients_code',
        'quantity',
        'phone_number',
        'delivery_date',
        'payment_method',
        'payment_location',
        'shipment_method', 
        'shipment_subdistrict',
        'shipment_location',
        'isdone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        if($this->menu_type == 'makanan')
            return $this->belongsTo(Makanan::class, 'menu_id', 'id');
        else if($this->menu_type = 'minuman')
            return $this->belongsTo(Minuman::class, 'menu_id', 'id');
        else return $this->belongsTo(Kue::class, 'menu_id', 'id');
    }

}
