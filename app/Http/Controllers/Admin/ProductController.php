<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Redirect,Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
  
class ProductController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{	

	    if(request()->ajax()) {
	    	$getData=Product::select('products.*','categories.category_name')->join('categories', 'products.category_id', '=', 'categories.id')->get();
	        return datatables()->of($getData)
	        ->addColumn('action', 'action')
	        ->rawColumns(['action'])
	        ->addIndexColumn()
	        ->make(true);
	    }
	    $categories= Category::where('status',1)->get();
	    return view('admin.product-list',["categories"=>$categories]);
	}
	  
	  
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{  
	    $productId = $request->product_id;

	   
    	$validationArray['title']='required|min:5|max:100';
    	$validationArray['category_id']='required';
    	$validationArray['description']='required';
    	$validationArray['price']='required|numeric|min:1';
    	$validationArrayMsg=array();
	    if(!empty($request->is_image_changed) || empty($productId)){
	    	$validationArray['image']='required|mimes:jpeg,jpg,png';
	    	$validationArrayMsg['category_id.required']='The category of the product is required.';
	    }
	    $this->validate($request,$validationArray,$validationArrayMsg);

	    $dataToProcess['title']=$request->title;
	    $dataToProcess['category_id']=$request->category_id;
	    $dataToProcess['description']=$request->description;
	    $dataToProcess['price']=$request->price;
	    if(!empty($request->is_image_changed) || empty($productId)){

	    	$imageName = time().'.'.$request->image->extension();  
        	$request->image->move(public_path('images'), $imageName);

        	$dataToProcess['image']=$imageName;

	    }
	    

	    $product   =   Product::updateOrCreate(['id' => $productId],
	                $dataToProcess);        
	    return Response::json($product);
	}
	  
	  
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{   
	    $where = array('id' => $id);
	    $product  = Product::where($where)->first();
	  
	    return Response::json($product);
	}
	  
	  
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	    $product = Product::where('id',$id)->delete();
	  
	    return Response::json($product);
	}
}