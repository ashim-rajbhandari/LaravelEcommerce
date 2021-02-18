<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    
//     return $request->user();
// });
Route::get('/data', function (Request $request) {
    return response()->json([
         ['product_name'=> "tv",'product_price'=> 200 , 'product_quantity'=>5],
         ['product_name'=> "shoe",'product_price'=> 200 , 'product_quantity'=>5],
         ['product_name'=> "pr",'product_price'=> 200 , 'product_quantity'=>5],
         ['product_name'=> "dj",'product_price'=> 200 , 'product_quantity'=>5], 
    ]);
});

