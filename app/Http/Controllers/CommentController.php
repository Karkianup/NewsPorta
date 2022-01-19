<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\NewsDetail;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
   function store(Request $request){
       $request->validate([
           "comment"=>"required",
                         ]);
       $comment=Comment::create($request->all());
       $comment->user_id=Auth::user()->id;
       $comment->save();
       return redirect()->back();
     }


}
