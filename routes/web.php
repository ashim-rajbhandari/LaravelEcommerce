<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Mail\ContactMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/mail', function () {
    
    return new ContactMail();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@contactsend')->name('contactsend');


Route::get('/product', 'ProductController@index')->name('product');
Route::post('/product/{product}', 'ProductController@store')->name('product.store');
Route::get('/product/sort/{product}', 'ProductController@sort')->name('product.sort');

Route::get('/cart', 'ProductController@cartview')->name('cart');
Route::delete('/cart/{cart}', 'ProductController@cartdestroy')->name('cart.destroy');
Route::get('/checkout', 'ProductController@checkout')->name('cart.checkout');


Route::get('/read', function () {
    $user = Auth()->user();
    
    // foreach($user->unreadNotification as $n)
    //      echo $n;
    $user->unreadNotifications->markAsRead(); 
    return back();

    //code for single read notification and dnt forget to use Request 
    // $u =$user->unreadNotifications()->where('id',$id)->first();    
    // $u->read_at = curren_time c0de;
    // $u->save();

});

