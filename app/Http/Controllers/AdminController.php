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
    public function create()
    {
      return view('admin.product'); 
    }
    public function store(Request $request)
    {
        $Validateddata = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $data = [
            'product_name' => $Validateddata['name'],
            'category' => $Validateddata['category'],
            'product_price' => $Validateddata['price'],
            'product_quantity' => $Validateddata['quantity'],
        ];
        
        $product = new Product;
        Product::create($data);

        return redirect()->back();
    }

}
