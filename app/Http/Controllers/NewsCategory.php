<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsDetail;

class NewsCategory extends Controller
{
    function show(Request $req){
            $newsArticle=NewsDetail::where('category_id',$req->searchCategory)->get();
            $category=Category::all();
              if(count($newsArticle)){
            return view('home_page',[
              "newsArticles"=>$newsArticle,
              "categories"=>$category,
            ]);
            }else{
                return "nothing to display";

            }
}
    function showPublisherArticle(Request $req){
            // $publisherArticle=NewsDetail::where('user_id',$req->user_id)->get();

            // return view('home_page',[
            //  "publisherArticles"=>$publisherArticle,
            // ]);
            echo"Hello my name is shila";




    }


}
