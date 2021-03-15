<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Division;
use Image;

class DivisionController extends Controller
{
    //
    public function index()
    {
    	$divisions=Division::orderBy('id','desc')->get();
    	return view('admin.pages.division.index',compact('divisions'));
    }
     public function create()
    {
    	
    	return view('admin.pages.division.create');
    	    }

    public function edit($id)
    {
    	$division=Division::find($id);
    	return view('admin.pages.division.edit',compact('division'));
    }

    public function delete($id)
    {
    	//echo $id;exit();
    	$Division=Division::find($id);
        $District=District::where('division_id',$Division->id)->get();
        foreach ($District as $dis) {
            $dis->delete();
        }


    	if(!is_null($Division))
    	{
    		$Division->delete();
    	}
    	session()->flash('success','Successfully Deleted');
    	return back();
    	//return view('admin.pages.product.edit')->with('product',$product);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name'=>'required',
    		'priority'=>'required',
    	],
    	[
    		'name.required'=>'Please provide a Division name',
    		'priority.required'=>'Please provide a Priority ',

    	]

 
    );
    	$division=new Division;
    	$division->name=$request->name;
    	$division->priority=$request->priority;
    	
    	$division->save();

    	
    	session()->flash('success','Successfully Created');
    	return redirect()->route('admin.divisions');
    }

 public function update(Request $request,$id)
    {
    	$request->validate([
    		'name'=>'required',
            'priority'=>'required',    		
    		
    	]);



    	$division=Division::find($id);
    	$division->name=$request->name;
    	$division->priority=$request->priority;
    	//print_r($product);exit();
    	$division->save();
    	

    	return redirect()->route('admin.divisions');
    }
}
