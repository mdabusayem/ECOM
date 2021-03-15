<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    public $fillable=[
    	'user_id',
    	'ip_address',
    	'product_id',
    	'product_quantity',
    	'shipping_address',
    	'order_id'
    	
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
	public function product()
    {
    	return $this->belongsTo(Product::class);
    }
    public static function totalItems()
    {
    	if(Auth::check()){
    		$carts=Cart::Where('user_id', Auth::id())
    		->Where('order_id',NULL)
    		->get();
    	}
    	else{
    		$carts=Cart::Where('ip_address',request()->ip())->where('order_id',NULL)->get();
    	}
    	$total_item=0;
    	foreach ($carts as $cart) {
    		$total_item+=$cart->product_quantity;
    	}
    	return $total_item;
    }
    public static function totalCarts()
    {
        if(Auth::check()){
            $carts=Cart::Where('user_id', Auth::id())
            ->Where('order_id',NULL)
            ->get();
        }
        else{
            $carts=Cart::Where('ip_address',request()->ip())->Where('order_id',NULL)->get();
        }
        
        return $carts;
    }

}
