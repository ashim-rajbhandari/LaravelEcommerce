<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    public  function showadminloginform()
    {
        return view('admin.login');
    }

    public  function showadminregistrationform()
    {
        return view('admin.registration');
    }
    
    
    //admin
    public function index()
    {
      $products = Product::all();
     
      return view('js.product-index')->with('products', $products);
      //return view('admin.product-index')->with('products', $products); 
    }
    public function create()
    {
      return view('js.product'); 
      //return view('admin.product'); 
    }
    public function store(Request $request)
    {
        
        $Validateddata = $request->validate([
            'name' => ['required','alpha'],
            'category' => ['required','alpha-dash'],
            'price' => ['required','numeric'],
            'quantity' => ['required','numeric'],
        ]);

        $data = [
            'product_name' => $Validateddata['name'],
            'category' => $Validateddata['category'],
            'product_price' => $Validateddata['price'],
            'product_quantity' => $Validateddata['quantity'],
        ];
        

        $this->authorize('create', Product::class); 
        Product::create($data);
        

        return redirect()->back();
    }

    public function edit(Product $product)
    {
        return view('js.product-edit')->with('product',$product);
        //return view('admin.product-edit')->with('product',$product);
    }

    public function update(Request $request , Product $product)
    {
        $Validateddata = $request->validate([
            'name' => ['required','alpha'],
            'category' => ['required','alpha-dash'],
            'price' => ['required','numeric'],
            'quantity' => ['required','numeric'],
        ]);

        $data = [
            'product_name' => $Validateddata['name'],
            'category' => $Validateddata['category'],
            'product_price' => $Validateddata['price'],
            'product_quantity' => $Validateddata['quantity'],
        ];
        
        $this->authorize('update', $product); 
        $product->update($data);

        //return redirect('/admin/product');
        return "updated";
    }

    public function destroy(Product $product)
    { 
        $this->authorize('delete', $product); 
        $product->delete();
  
             
        //return back(); for laravel
        return "deleted";
    }

}
