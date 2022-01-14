<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class NewsCategory extends Controller
{
    function show(Request $req){
         Category::where('category_id',$req->searchCategory);
         return view('home_page');




    }
}
