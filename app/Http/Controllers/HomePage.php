<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsDetail;
use App\Models\Category;


class HomePage extends Controller
{
    function index(Request $request){
        $newsDetails = NewsDetail::select('*');
        $category = Category::all();

        if($request->query('searchCategory'))
            $newsDetails->where('category_id', $request->query('searchCategory'));
        if($request->query('term'))
            $newsDetails->where('title', $request->query('term'));

      return view('home_page', [
        "newsDetails" => $newsDetails->get(),
        "categories"=>$category
    ]);
    }


}
