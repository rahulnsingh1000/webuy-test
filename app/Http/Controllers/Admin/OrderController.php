<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Order;
use Redirect,Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
  
class OrderController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the orders.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{	
		// display all the orders in the desc order
	    if(request()->ajax()) {
	    	$getData=Order::select('product_id','products.image','products.title','categories.category_name','users.name','users.email','users.mobile','orders.*')->join('products', 'orders.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'orders.user_id', '=', 'users.id')->get();

	        return datatables()->of($getData)
	        ->addColumn('action', 'action')
	        ->rawColumns(['action'])
	        ->addIndexColumn()
	        ->make(true);
	    }
	    return view('admin.order-list');
	}

	
	  
}