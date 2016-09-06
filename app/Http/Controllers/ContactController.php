<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send(Request $request)
    {
        Mail::send('mail',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('ilyas@eulestudio.com');
                $message->to('ilyas156@yahoo.com', 'Admin')->subject('Feedback');
            });
        return redirect('/')->with('message', 'Thanks for contacting us!');
    }
}