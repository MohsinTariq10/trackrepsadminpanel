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
                $message->from('');
                $message->to('ilyas156@yahoo.com', 'Admin')->subject('Feedback');
            }
        );
        return redirect('/')->with('message', 'Thanks for contacting us!');
    }
    public function upload(Request $request){
        if ($file = $request->file('ImageName')) {
            $member_image = $file->getClientOriginalName();
            $file->move('userimages', $member_image);
            echo "Done";
        }else{
            echo "File Not Found";
        }
    }
}