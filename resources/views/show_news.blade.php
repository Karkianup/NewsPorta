@extends('layouts.app')
@section('content')
   <div class="container addNews">
      <div class="row">
            <div class="col-8">

                    @if(auth()->check())
                        @if(auth()->user()->id==$newsDetails->user_id)
                            <a href={{"/news/delete/".$newsDetails->id}} style="position: absolute;left:60%;font-size:22px;text-decoration:none" class="btn btn-danger">Delete your Post</a>
                            <a href={{"/news/edit/".$newsDetails->id}} style="position: absolute;left:44%;font-size:22px;text-decoration:none" class="btn btn-warning">Edit Your Post </a><br><br><br>
                        @endif
                    @endif

                  <div class="card-header" style="background-color:blue">
                        <h1 style="font-weight:bold;font-family:verdana;color:white;font-size:54px;">{{$newsDetails->title  }}</h1><br>
                  </div>

                  <div class="card">
                            <div class="card-body">
                            <img src="{{asset('images/'.$newsDetails->image)}}" width="400px" height="200px" style="border-radius:30px"><br><br>
                            <span style="color:black;font-weight:bold;font-size:24px">{{ $newsDetails->post }} </span><br><br>

                            <span style="color:black;font-weight:bold;font-size:24px">Article by:</span><span style="font-weight: bold;color:seagreen;font-size:29px">{{ $newsDetails->user->name }}</span>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
