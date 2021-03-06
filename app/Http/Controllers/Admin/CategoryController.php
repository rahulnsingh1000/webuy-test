<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Redirect,Response;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{	
	public function __construct(){
		$this->middleware('auth');
		$this->middleware('admin');
	}
	
    /**
	 * Display a listing of the category.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	    if(request()->ajax()) {
	        return datatables()->of(Category::select('*'))
	        ->addColumn('action', 'action')
	        ->rawColumns(['action'])
	        ->addIndexColumn()
	        ->make(true);
	    }
	    return view('admin.category-list');
	}
	  
	  
	/**
	 * Store a newly created category in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{  
	    $CategoryId = $request->category_id;

	    if(empty($CategoryId)){
	    	$validationArray['category_name']='required|min:2|max:100|unique:categories,category_name';
	    }else{
	    	$validationArray['category_name']='required|min:2|max:100';
	    }

	    
    	$validationArray['status']='required';
    	$validationArrayMsg=array();
	    $this->validate($request,$validationArray,$validationArrayMsg);

	    $category   =   Category::updateOrCreate(['id' => $CategoryId],
	                ['category_name' => $request->category_name, 'status' => $request->status]);        
	    return Response::json($category);
	}
	  
	  
	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{   
	    $where = array('id' => $id);
	    $category  = Category::where($where)->first();
	  
	    return Response::json($category);
	}
	  
	  
	/**
	 * Remove the specified category from storage.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	    $category = Category::where('id',$id)->delete();
	  
	    return Response::json($category);
	}
}
