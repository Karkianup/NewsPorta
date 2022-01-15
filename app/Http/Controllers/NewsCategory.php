<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsDetail;

class NewsCategory extends Controller
{
    function show(Request $req){
            $Category=NewsDetail::where('category_id',$req->searchCategory)->get();
            //   if(count($Category)){
            return view('home_page',[
              "categories"=>$Category,
            ]);


    // }
}}
