<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\District;
use App\Division;
use Image;

class DistrictController extends Controller
{
    //
    public function index()
    {
    	$districts=District::orderBy('id','desc')->get();
    	return view('admin.pages.district.index',compact('districts'));
    }
     public function create()
    {
        $divisions=Division::orderBy('priority','asc')->get();
    	
    	return view('admin.pages.district.create',compact('divisions'));
    	    }

    public function edit($id)
    {

        $divisions=Division::orderBy('priority','asc')->get();
    	$district=District::find($id);
    	return view('admin.pages.district.edit',compact('district','divisions'));
    }

    public function delete($id)
    {
    	//echo $id;exit();
    	$district=District::find($id);
    	if(!is_null($district))
    	{
    		$district->delete();
    	}
    	session()->flash('success','Successfully Deleted');
    	return back();
    	//return view('admin.pages.product.edit')->with('product',$product);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name'=>'required|max:150',
    		'division_id'=>'required',
    	],
    	[
    		'name.required'=>'Please provide a district name',
    		'division_id.required'=>'Please select division ',

    	]

 
    );
    		
    		
    
    	$district=new District;
    	$district->name=$request->name;
    	$district->division_id=$request->division_id;
    	
    	
    	//print_r($product);exit();
    	$district->save();

    	
    	session()->flash('success','Successfully Created');
    	return redirect()->route('admin.districts');
    }

 public function update(Request $request,$id)
    {
    	$request->validate([
    		'name'=>'required|max:150',
    		'division_id'=>'required',
    		
    	]);



    	$district=District::find($id);
    	$district->name=$request->name;
    	$district->division_id=$request->division_id;
    	//print_r($product);exit();
    	$district->save();
    	

    	return redirect()->route('admin.districts');
    }
}
