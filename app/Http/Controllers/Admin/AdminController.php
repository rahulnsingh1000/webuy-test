<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Models\Product;
use Illuminate\Http\Request;
use Redirect,Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
  
class AdminController extends Controller
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
	public function dashboard()
	{
	    return view('admin.dashboard');
	}
	  
}