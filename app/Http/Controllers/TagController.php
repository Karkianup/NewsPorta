<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function showTagItem($id){
       $tag= Tag::find($id);
          return view('tag.tag_item',["tags"=>$tag]);

    }
}
