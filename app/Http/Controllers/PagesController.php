<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function index()
    {
    	$products=Product::OrderBy('id','desc')->paginate(9);
    	return view('pages.index')->with('products',$products);
    }

    public function products()
    {
    	$products=Product::OrderBy('id','desc')->get();
    	return view('pages.product.index')->with('products',$products);
    }
    public function search(Request $request)
    {
    	$search=$request->search;
    	$products=Product::orwhere('title','like','%'.$search.'%')->
    	orwhere('description','like','%'.$search.'%')->
    	orwhere('price','like','%'.$search.'%')->
    	orderBy('id','desc')->paginate(9);
    	return view('pages.product.search',compact('search','products'));
    }
}
