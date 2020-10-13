<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Notifications\Giveaway; 
use App\Http\Requests\ContactUs;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Support\Facades\Notification;    use in case of multiple users

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //    $a = "hey";
    //     User::find(Auth()->user()->id)->notify(new Giveaway($a));
        $summer = Product::where('category','Summer')->get(); 
        $digital = Product::where('category','Digital')->get(); 
         return view('home')->with(['summer'=>$summer,'digital'=>$digital]);

          // $users = User::find(1);
        // Notification::send($users, new Giveaway());   facades
    }
    public function contact()
    {
     
        return view('contact');
    }
    public function contactsend(ContactUs $request)
    {
        Mail::to('ash.rbd@gmail.com')->send(new ContactMail($request)); //dont use this unless mailtrap/smtp etc is given
        // return new ContactMail($request); //for localhost checkiong
        return redirect('/contact')->with('status',"Thank ypu for your message");
        
    }
 
}
