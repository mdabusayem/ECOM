<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Image;

class CategoryController extends Controller
{
    //
    public function index()
    {
    	$categories=Category::orderBy('id','desc')->get();
    	return view('admin.pages.category.index',compact('categories'));
    }
     public function create()
    {
    	$main_categories=Category::orderBy('name','desc')->where('parent_id',NULL)->get();
    	return view('admin.pages.category.create',compact('main_categories'));
    	    }

    public function edit($id)
    {
    	$category=Category::find($id);
    	$main_categories=Category::orderBy('name','desc')->where('parent_id',NULL)->get();
    	return view('admin.pages.category.edit',compact('category','main_categories'));
    }

    public function delete($id)
    {
    	//echo $id;exit();
    	$category=Category::find($id);
    	if(!is_null($category))
    	{
    		$category->delete();
    	}
    	session()->flash('success','Successfully Deleted');
    	return back();
    	//return view('admin.pages.product.edit')->with('product',$product);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name'=>'required|max:150',
    		'category_image'=>'nullable|image',
    	],
    	[
    		'name.required'=>'Please provide a category name',
    		'category_image.image'=>'Please provide a image ',

    	]

 
    );
    		if($request->category_image!=0){
    		$image=$request->category_image;
    		$img=time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/category/'.$img);

    		Image::make($image)->save($location);

    		}
    		else{
    			$img=NULL;
    		}
    		
    
    	$category=new Category;
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->parent_id=$request->parent_id;
    	$category->image=$img;
    	//print_r($product);exit();
    	$category->save();

    	
    	session()->flash('success','Successfully Created');
    	return redirect()->route('admin.categories');
    }

 public function update(Request $request,$id)
    {
    	$request->validate([
    		'name'=>'required|max:150',
    		
    		
    	]);



    	$category=Category::find($id);
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->parent_id=$request->parent_id;
    	
    	//print_r($product);exit();
    	$category->save();
    	

    	return redirect()->route('admin.categories');
    }
}
