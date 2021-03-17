<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\UserAddresses;
use Auth;
use Redirect,Response;
class UserOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
        $this->middleware('customer');
        
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


    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        //if product not found redirect to not found page
        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "title" => $product->title,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout()
    {   
        $user_id=Auth::user()->id;

        $where = array('user_id' => $user_id, 'status'=> 1);
        $address  = UserAddresses::where($where)->first();
        if(!empty($address)){ // check if address not added for the logged user ask him to add address then place order
            $cart = session()->get('cart');
            if(session('cart')){
                $order_id=time();

                $total=0;
                foreach(session('cart') as $id => $details){
                    $total += $details['price'] * $details['quantity'];
                    Order::create([
                        'order_id' => $order_id,
                        'user_id' => $user_id,
                        'product_id' => $id,
                        'quantity' => $details['quantity'],
                        'price' => $details['price'],
                        'total' => $total,
                        'address' => $address['address_line1']." ".$address['address_line2'].$address['address_line3']." ".$address['pincode'].$address['city']." ".$address['state']." ".$address['county'],
                        'current_status' => 1 // current status 1 means order has been placed
                    ]);
                }
                session()->forget('cart');
                return redirect('/')->with('message', 'Thanks! Your order has been placed.');
            }else{
                 return redirect('/')->with('message', 'Please add some items in cart then checkout.');
            }
        }else{
            return view('add-address');
        }
    }

    /**
     * Add user address here.
     *
     * @param  array  $data
     * 
     */
    public function addAddress(Request $request)
    {   
        $user_id=Auth::user()->id;

        $validationArray['address_line1']='required|min:2|max:255';
       //$validationArray['address_line2']='min:2|max:255';
        //$validationArray['address_line3']='min:2|max:255';
        $validationArray['pincode']='required|min:6|max:6';
        $validationArray['city']='required|numeric|min:1';
        $validationArray['state']='required|numeric|min:1';
        $validationArray['country']='required|numeric|min:1';
        $validationArrayMsg=array();
        
        $this->validate($request,$validationArray,$validationArrayMsg);

        UserAddresses::create([
            'user_id' => $user_id,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'address_line3' => $request->address_line3,
            'pincode' => $request->pincode,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
        ]);

        return redirect('/checkout');
    }
}
