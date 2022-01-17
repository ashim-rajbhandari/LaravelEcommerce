<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ChatController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    } 
    
    public function index()
    {
      return  view('chat.chat');
    }
     
    public function send(Request $request)
    {      
         $user = Auth::user();
         event(new ChatEvent($request->message, $user));
         //broadcast(new ChatEvent($request->message, $user))->toOthers();  *dont need to use dontbroadcst on event
    }
}
