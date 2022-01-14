<?php

namespace App\Http\Controllers;

use App\Models\NewsDetail;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class News extends Controller
{

    function index()
    {
        $newsDetails = NewsDetail::all();

        return view('home_page', [
            "newsDetails" => $newsDetails,
        ]);
    }


    function create()
    {
        return view('add_news');
    }

    function store(Request $req)
    {
        $req->validate([
            "title" => "required | string | max:255 | min:2",
            "post" => "required",
            "image" => "required",
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
        return view('show_news', [
            'newsDetails' => $newsDetail

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

        $news = NewsDetail::find($id);
        $publisher_id = $news->user_id;
        $user_id = auth()->user()->id;
        if ($publisher_id == $user_id) {
            $news->delete();
            return redirect('/')->with('message', 'deleted successfully');
        } else {
            return redirect('/')->with('message', 'You are not eligible to delete');
        }
    }
}
