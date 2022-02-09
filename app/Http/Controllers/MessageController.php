<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    function index(){
          $messages=Message::with('sender','receiver')->where('to',auth()->user()->id)->get();
            // $messages=Auth::user()->with('sent','received')->has('sent','received')->get();
            //  $messages=Message::with('sender','receiver')->auth()->user()->get();
            //  $messages=Auth::user()->with('sent','received')->get();
            // return $messages;
        //   $messages=User::with('sent','received')->where('id',auth()->user()->id)->orWhere('id',auth()->user()->id)->get();
        //   return $messages;
        // $messages=Auth::user()->received()->distinct('from')->pluck('from');
        return $messages;





        return view('messages.index',[
            "messages"=>$messages,

        ]);
    }
    function show($id){
        $message=Message::with('sender','receiver')
                ->where('from',$id)
                ->where('to',auth()->user()->id)
                ->orderBy('created_at','asc')
                ->get();

        $reply=Message::with('sender','receiver')
                ->where('to',$id)
                ->where('from',auth()->user()->id)
                ->orderBy('created_at','asc')
                ->get();




        return view('messages.show_message',[
           "messages"=> $message,
           "replies"=>$reply,
        ]);
    }
}
