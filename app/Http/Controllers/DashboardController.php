<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboardView(){

    }
    function userProfileView(){
        return view('user_profile');
    }

    function show(){
         $userDetail=User::find(auth::user()->id);
         return view('user_profile',[
             'userDetail'=>$userDetail

         ]);

    }


}
