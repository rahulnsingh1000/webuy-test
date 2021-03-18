<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        //$this->middleware('auth');
       // $this->middleware('customer');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        return view('home');
    }*/

    public function index()
    {   

        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/dashboard');
        }
        
        $products = Product::all();

        return view('products', compact('products'));
    }
}
