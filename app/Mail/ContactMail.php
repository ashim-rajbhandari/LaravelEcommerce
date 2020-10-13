<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUs;


class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    
    public function __construct($request)
    {
        // $this->name = $request->name;
        // $this->email = $request->email;
        // $this->subject = $request->subject;
        // $this->message = $request->message;
        $this->request = $request->data();

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()      //Request $request can use this and no need for construct
    {
        return $this->from($this->request['email'])
        ->view('mail.mail')
        ->with([
            'name'=> $this->request['name'],
            'subject'=> $this->request['subject'],
            'msg'=> $this->request['message'],
        ]);
    }
}
