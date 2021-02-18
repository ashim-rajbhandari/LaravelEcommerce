<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use App\Product;
use App\User;
use App\Cart;
use Auth;
use App\Notifications\Giveaway; 


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function __construct()
    {
        // auth id error
    } 
    
    public function index()
    {
    //API OF PRODUCT
        //    $response = Http::timeout(60)->get('http://localhost:1000/api/data');
        //    $data =$response->json();
        //    return view('api')->with('data',$data);
    //END OF API PRODUCT 
    
    
    //PLEASE UNCOMMENT THIS FOR PRODUCT DB
        $products = Product::all();      // dd db/ele/collection // gettype object
        $sort='All Product';
        
        return view('product')->with(['products'=>$products,'sort'=>$sort]);
     }

    public function cartview()
    {
        $a = Auth::user()->id;
        $user = User::find($a);
        $uid = $user->id;

        $pro = User::find($uid)->products;    //elequoent relationship many to many
    
        $total = User::find($uid)->products()->where('product_quantity','>',0)->where('checkout',0)->sum('price');
        //$total=Cart::where(['user_id'=>$uid,'checkout'=> 0])->sum('price');
        
        
        return view('cart')->with(['product'=>$pro,'total'=>$total]);
        
        
        /* without elequoent relationship
         $prod=[];
         $cart= Cart::where('user_id' , $uid)->get()->pluck('product_id');  // dd supp/collection coz of pluck // gettype object
        
        foreach($cart as $pid)
        {
           $product = Product::where('id', $pid)->get();
           array_push($prod, $product);
        }
        
        $pro=Arr::flatten($prod);
        
        
        return view('cart')->with(['uid'=>$uid,'product'=>$pro]);
          */      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        // $a = Auth::user()->id;
        // $user = User::find($a);
        // $uid = $user->id;
         //$c = Cart::where('user_id' , $uid)->get()->pluck('product_id')->toArray(); //return object without toarray
        
        
        $c = Cart::where(['user_id'=>Auth::user()->id,'checkout'=> 0])->pluck('product_id')->toArray(); //product id to check if already purchased
        $cart=Cart::where(['user_id' => Auth::user()->id, 'product_id'=>$product->id])->first();
            
        
       
        if($cart != null && (in_array($product->id,$c)))
        {
            if($cart->quantity + $request->qt > $product->product_quantity)
            {
                return "Quantity exceded";
            }
            else{
                $cart->quantity += $request->qt;
                $cart->price += $request->qt * $product->product_price;
                $cart->save();
            }
        }
        else
        { 
            if($request->qt > $product->product_quantity)
            {
                return "Quantiy exceded ,take less product";
            }
            else{
                $cart = new Cart;
                $cart->product_id = $product->id;
                $cart->user_id = Auth::user()->id;
                $cart->quantity = $request->qt;
                $cart->price= $request->qt * $product->product_price;
                $cart->save();
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cartdestroy(Cart $cart)
    {
        $cart->delete();
       return redirect('/cart');
    } 
    public function checkout()
    {
        //$pro = Cart::where(['user_id'=>Auth()->user()->id,'checkout'=>0])->pluck('product_id');
        $pro = User::find(Auth()->user()->id)->products()->where('product_quantity','>',0)
                 ->where('checkout',0)->pluck('product_id');
        foreach($pro as $p)
        {
            $a =Cart::select('quantity')->where(['user_id'=>Auth()->user()->id ,'product_id'=>$p])->first();
            $q = Product::where('id',$p)->first();
         
            $q->product_quantity -= $a->quantity;
            $q->save();
        }

        $cart = Cart::where(['user_id'=>Auth()->user()->id,'checkout'=>0])->get();
        foreach($cart as $c)
        {
            $c->checkout = 1;
            $c->save();
        }

        User::find(Auth()->user()->id)->notify(new Giveaway());
       
        return redirect('/cart');
    }


    public function sort($product)
    {
        
        if ($product=="max"){
        //$p=Product::orderByDesc('product_price')->get();   for eleqouent 
        $products= Product::all()->sortByDesc('product_price'); //use colleection helper
         $sort= "High to low";
        }

        if ($product=="min"){
       $products= Product::all()->sortBy('product_price');
        $sort="Low to high";
        }
       return view('product')->with(['products'=>$products,'sort'=>$sort]);
    }
    public function discount()
    {
        $discount_percentage = Product::discount(20,10);
        return  $discount_percentage;
    }
}