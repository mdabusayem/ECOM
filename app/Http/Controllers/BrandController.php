<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Image;

class brandController extends Controller
{
    //
    public function index()
    {
    	$brands=Brand::orderBy('id','desc')->get();
    	return view('admin.pages.brand.index',compact('brands'));
    }
     public function create()
    {
    	
    	return view('admin.pages.brand.create');
    	    }

    public function edit($id)
    {
    	$brand=Brand::find($id);
    	return view('admin.pages.brand.edit',compact('brand'));
    }

    public function delete($id)
    {
    	//echo $id;exit();
    	$brand=Brand::find($id);
    	if(!is_null($brand))
    	{
    		$brand->delete();
    	}
    	session()->flash('success','Successfully Deleted');
    	return back();
    	//return view('admin.pages.product.edit')->with('product',$product);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name'=>'required|max:150',
    		'brand_image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a brand name',
    		'brand_image.image'=>'Please provide a image ',

    	]

 
    );
    		if($request->brand_image!=0){
    		$image=$request->brand_image;
    		$img=time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/brand/'.$img);

    		Image::make($image)->save($location);

    		}
    		else{
    			$img=NULL;
    		}
    		
    
    	$brand=new Brand;
    	$brand->name=$request->name;
    	$brand->description=$request->description;
    	
    	$brand->image=$img;
    	//print_r($product);exit();
    	$brand->save();

    	
    	session()->flash('success','Successfully Created');
    	return redirect()->route('admin.brands');
    }

 public function update(Request $request,$id)
    {
    	$request->validate([
    		'name'=>'required|max:150',
    		
    		
    	]);



    	$brand=Brand::find($id);
    	$brand->name=$request->name;
    	$brand->description=$request->description;
    	//print_r($product);exit();
    	$brand->save();
    	

    	return redirect()->route('admin.brands');
    }
}
