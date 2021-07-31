<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    function getMessageInfo() {
        return Message::all();
    }
    
    function sendMessage(Request $request) {
        $message = new Message();
        $message->sender_name = $request->sender_name;
        $message->sender_email = $request->sender_email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        Mail::to("searchmax97@gmail.com")->send(new MessageMail($message));
        return "Message sent succesfully!";
    }
}
