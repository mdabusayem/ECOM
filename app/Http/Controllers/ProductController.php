<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
    	$product=Product::where('slug',$slug)->first();
    	if (!is_null($product)) {
    		# code...
    		return view("pages.product.show",compact('product'));

    	}
    	else{
    		session()->flash('errors','Sorry!! There is no product by this URL.');
    		return redirect()->route('products');
    	}

    }
}
