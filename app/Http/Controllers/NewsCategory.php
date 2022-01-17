<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsDetail;

class NewsCategory extends Controller
{
    function category(Request $req){
            $newsArticle=NewsDetail::where('category_id',$req->searchCategory)->get();
            $category=Category::all();
            // return $newsArticle;

              if(count($newsArticle)){
            return view('home_page',[
              "newsArticles"=>$newsArticle,
              "categories"=>$category,
                ]);
            // return $newsArticle;
            // }else{
                //  return redirect()->back()->with('message','No news related this specific category');

                //   }
               }
}
    function showPublisherArticle(Request $req){
      if(isset($_POST["searchLoggedUserArticle"])){
            $publisherArticle=NewsDetail::where('user_id',$req->user_id)->get();
            $category=Category::all();

            // return $publisherArticle;

            return view('home_page',[
             "newsArticles"=>$publisherArticle,
             "categories"=>$category,
            ]);

      }
            }


}
