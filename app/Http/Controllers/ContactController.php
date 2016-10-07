<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

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
                $message->from('trackrepasapp@gmail.com');
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
    public function sendNotification()
    {
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");
        $header = array('Content-Type: application/json',
            "Authorization: key=AIzaSyBsM3Tvgzgg4b4eQVDrf3ks4M3iIm1J9KY");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"data\": {    \"title\": \"General\",   
         \"text\": \"Just a notification \"  },
          \"to\" : \"/topics/Poll\"}");

        $resultt = curl_exec($ch);
        curl_close($ch);
        return redirect::back()->with('message','Notification Has been send');
    }
}