<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function show(){
         $userDetail=Auth::user();
         $count=Auth::user()->newsDetails->count('user_id');
        //  return $count;
         return view('user_profile',[
             'userDetail'=>$userDetail,
             'count'=>$count,

         ]);

    }
    public function myPosts()
    {
        $authPost = Auth::user()->newsDetails;
        if (count($authPost)) {
            return view('auth_user_posts', [
                "authPosts" => $authPost,

            ]);
        } else {
            return redirect('user/dashboard/posts')->with('message', 'You have no articles');
            // return redirect('/user/posts')->with('message','hello');


        }
    }


}
