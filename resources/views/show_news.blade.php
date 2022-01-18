@extends('layouts.app')
@section('content')
   <div class="container showNews">
      <div class="row">
            <div class="col-8">
                <div class="card-header">
                    <h1 style="font-weight:bold;color:black;font-size:54px;text-align:center">{{$newsDetails->title  }}</h1><br>
                    published by:{{$newsDetails->user->name}}<br>
                                 {{$newsDetails->created_at}}

                </div>
                <div class="card">
                        <div class="card-body">
                            <img src="{{asset('images/'.$newsDetails->image)}}" width="100%" height="100%"><br><br>
                            <span style="color:black;font-weight:bold;font-size:24px">{{ $newsDetails->post }} </span><br><br>
                            @if(auth()->check())
                                @if(auth()->user()->id==$newsDetails->user_id)
                                    <a href={{"/news/delete/".$newsDetails->id}} style="position: absolute;left:70%;font-size:22px;text-decoration:none" class="btn btn-danger">Delete your Post</a>
                                    <a href={{"/news/edit/".$newsDetails->id}} style="position: absolute;left:44%;font-size:22px;text-decoration:none" class="btn btn-warning">Edit Your Post </a><br><br><br>
                                @endif
                            @endif
                        </div>
                </div>
            </div>
            <div class="col-1">

            </div>
            <div class="col-3">
                <div class="card-header" style="background-color:black;color:white;text-align:center">
                    You can also watch

                </div>
                <div class="card">
                    @foreach ($categoryNews as $cn)
                    <div class="card-body">
                        <a href={{ "/news/".$cn->id }} style="text-decoration:none;color:black">
                        <h1> {{ $cn->title }}</h1>
                         <img src="{{ asset('images/'.$cn->image) }}" style="width:100%;height:100%">
                    </div><hr>
                </a>
                    @endforeach

                     </div>





                </div>
            </div>
         </div>
    </div>

@endsection
