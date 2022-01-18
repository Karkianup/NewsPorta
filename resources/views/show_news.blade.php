@extends('layouts.app')
@section('content')
   <div class="container showNews">
      <div class="row">
            <div class="col-8">
                {{-- <div class="card-header"> --}}
                    <h1 style="text-align:center;color:black">{{$newsDetails->title  }}</h1><br>
                    <span style="color:white">publisher:{{$newsDetails->user->name}}<br>
                                 {{-- {{$newsDetails->created_at->diffForHumans()}} --}}

                                 {{ date_format($newsDetails->created_at,'D M Y') }}</span>

                {{-- </div> --}}
                <div class="card">
                        <div class="card-body">
                            <img src="{{asset('images/'.$newsDetails->image)}}" width="100%" height="400px"><br><br>
                            <span style="color:black;font-size:22px">{{ $newsDetails->post }} </span><br><br>
                            @if(auth()->check())
                                @if(auth()->user()->id==$newsDetails->user_id)
                                    <a href={{"/news/delete/".$newsDetails->id}} style="position: absolute;left:70%;font-size:22px;text-decoration:none" class="btn btn-danger">Delete your Post</a>
                                    <a href={{"/news/edit/".$newsDetails->id}} style="position: absolute;left:44%;font-size:22px;text-decoration:none" class="btn btn-warning">Edit Your Post </a><br><br><br>
                                @endif
                            @endif
                        </div>
                </div>
            </div>
            <div class="col-1"> </div>
            <div class="col-3">
                <div class="card-header" style="background-color:black;color:white;text-align:center">
                    Latest
                </div>
                <div class="card">
                    @foreach ($categoryNews as $cn)
                        <div class="card-body">
                            <a href={{ "/news/".$cn->id }} style="text-decoration:none;color:black">
                                <h5> {{ $cn->title }}</h5>
                                <img src="{{ asset('images/'.$cn->image) }}" style="width:100%;height:100%"><br>
                                {{ Str::limit($cn->post,70) }}
                        </div><hr>
                            </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
