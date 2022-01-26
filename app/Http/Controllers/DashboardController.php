<?php

namespace App\Http\Controllers;

use App\Models\NewsDetail;
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

            return view('auth_user_posts', [
                "authPosts" => $authPost,

            ]);


    }
    public function viewDeletedItems(){
        //  return NewsDetail::where('id',4)->first();
         $deletedItems=Auth::user()->newsDetails()->onlyTrashed()->get();

         return view('view_deleted_items',[
             'deletedItems' => $deletedItems,
         ]);

    }
}
