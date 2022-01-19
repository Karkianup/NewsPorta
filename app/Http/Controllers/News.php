<?php

namespace App\Http\Controllers;

use App\Models\NewsDetail;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use PDO;

class News extends Controller
{

    function create()
    {
        $category = Category::all();
        return view('add_news', [
            "categories" => $category,

        ]);
    }

    function store(Request $req)
    {
        $req->validate([
            "title" => "required | string | max:255 | min:2",
            "post" => "required|max:17000",
            "image" => "required",
            "category_id" => "required",
        ]);

        $newsDetail = NewsDetail::create($req->all());
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('images/', $fileName);
            $newsDetail->image = $fileName;
            $newsDetail->user_id = auth()->user()->id;
            $newsDetail->save();
        }
        return redirect()->back()->with('message', 'Post successfully');
    }

    function show($id)
    {
        $newsDetail = NewsDetail::with('user')->find($id);
        $comment= Comment::with('newsDetail','user')->where('news_detail_id',$id)->get();


        $categoryNews=NewsDetail::latest()->take('3')->get();


        return view('show_news', [
            'newsDetails' => $newsDetail,
            'categoryNews' => $categoryNews,
            'comments'=>$comment


        ]);

    }

    function edit($id)
    {
        $newsDetails = NewsDetail::find($id);
        // $user=NewsDetail::with('user')->find($id);
        // $publisher_id=$user->user->id;
        // $user_id=auth()->user()->id;

        $publisher_id = $newsDetails->user_id;
        $user_id = auth()->user()->id;
        if ($user_id == $publisher_id) {
            return view('edit_news', [
                "newsDetails" => $newsDetails
            ]);
        } else {
            return redirect('/')->with('message', 'You are not eligible to edit');
        }
    }


    function update(Request $req)
    {
        $newsUpdate = NewsDetail::find($req->id)->update($req->all());


        if ($req->hasFile('image')) {
            $destination = 'images/' . $newsUpdate->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('images/', $fileName);
            $newsUpdate->image = $fileName;
            $newsUpdate->update();
        }

        return redirect()->back()->with('message', 'Your article have been updated successfully');
    }

    function destroy($id)
    {

        $post = Auth::user()->newsDetails()->find($id);
        if ($post) {
            $post->delete();
            return redirect('/user/dashboard/posts')->with('message', 'Dphpeleted successfully');
        } else
            return redirect('/user/dashboard/posts')->with('message', 'No post with given id found');
        // $news = NewsDetail::find($id);
        // $publisher_id = $news->user_id;
        // $user_id = auth()->user()->id;


    }



    // function category(){
    //    $category=Category::all();
    //     return view('add_news',[
    //          'category'=>$category,

    //     ]);

    // }
}
