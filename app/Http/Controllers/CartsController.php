<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use Auth;


class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cart.carts');
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'=>'required'
        ],
        [
            'product_id.required'=>'Please give a product'
        ]);
       // echo $request->product_id;exit();
        if (Auth::check()) {
            $cart=Cart::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        }
        else
        {
            $cart=Cart::where('ip_address',request()->ip())->where('product_id',$request->product_id)->first();
        }


        if(!is_null($cart)){
            $cart->increment('product_quantity');
        }
        else{
            $cart = new Cart();
            if(Auth::check())
            {
                $cart->user_id=Auth::id();

            }
            $cart->ip_address=request()->ip();
            $cart->product_id=$request->product_id;
            $cart->save();

        }

        
        
        session()->flash('success','Product has added to cart !!');
        return back();

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart=Cart::find($id);
        if(!is_null($cart))
        {
            $cart->product_quantity=$request->product_quantity;
            $cart->save();
        }
        else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart item has updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::find($id);
        if(!is_null($cart))
        {
            $cart->delete();
        }
        else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart item has deleted successfully');
        return back();
    }
}
