<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsDetail;

class NewsCategory extends Controller
{
    function show(Request $req){
         if(isset($_POST['newsFilter'])){
            $Category=NewsDetail::where('category_id',$req->searchCategory)->get();
            return view('home_page',[
            "categories"=>$Category,

            ]);

        }


    }
}
