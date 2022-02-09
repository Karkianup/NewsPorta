<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Attachment;

class FavouriteController extends Controller
{
    function index(){
        $favorites=Auth::user()->news()->get();
        return view('favourite.favourite',compact('favorites'));
    }
    function store(Request $request)
    {
        Favourite::firstOrCreate([
            "news_detail_id"=>$request->news_detail_id,
            "user_id"=>auth()->user()->id,

        ]);
        return redirect()->back();
    }
}
