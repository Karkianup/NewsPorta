@extends('layouts.app')
@section('content')
   <div class="container showNews">
      <div class="row">
            <div class="col-8">
                {{-- <div class="card-header"> --}}
                    <h1 style="text-align:center;color:black">{{$newsDetails->title  }}</h1><br>
                    <span style="color:white">publisher:{{$newsDetails->user->name}}<br>
                                 {{-- {{$newsDetails->created_at->diffForHumans()}} --}}

                                 {{ date_format($newsDetails->created_at,'D M Y') }}</span><br>
                                 <span style="color:white">Total-views:{{ $newsDetails->views_count }}</span>

                {{-- </div> --}}
                <div class="card">
                        <div class="card-body">
                            <img src="{{asset('images/'.$newsDetails->image)}}" width="100%" height="400px"><br><br>
                            <span style="color:black;font-size:22px">{!! nl2br($newsDetails->post) !!} </span><br><br>
                            @if(auth()->check())
                                @if(auth()->user()->id==$newsDetails->user_id)
                                    <a href={{"/news/delete/".$newsDetails->id}} style="position: absolute;left:70%;font-size:22px;text-decoration:none" class="btn btn-danger">Delete your Post</a>
                                    <a href={{"/news/edit/".$newsDetails->id}} style="position: absolute;left:44%;font-size:22px;text-decoration:none" class="btn btn-warning">Edit Your Post </a><br><br><br>
                                @endif
                            @endif
                        </div>
                </div><br>
                {{-- for user comments --}}
                @error('comment') <div class="alert alert-warning">{{ "*".$message }}</div>@enderror
                @if(auth()->check())
                <form action="/comment" method="POST">
                    @csrf
                    <input type="text" name="news_detail_id" value="{{ $newsDetails->id }}" hidden>
                    <textarea name="comment" rows="6" cols="1" class="form-control" placeholder="place your comments here"></textarea>
                     <input type="submit" value="comment" class="btn btn-primary">
                </form><br>
                @else
                   <div class="card">
                       <div class="card-header">
                            <a href="{{ route('login') }}" style="font-size:28px;text-decoration:none;">Click here to Login</a>
                        </div>
                   </div>
                @endif <br>
                <div class="card">
                    <div class="card-header" style="background-color:blue;color:white;">
                        Comments
                    </div>
                    @foreach ($comments as $c)
                        <div class="card-body">
                            <span style="font-weight:bold">{{ $c->user->name }}&nbsp;{{$c->created_at->diffForHumans()}}</span><br>
                                                            {{ $c->comment }}
                        </div><hr>
                    @endforeach

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
                            <a href={{ "/news/".$cn->id }} style="text-decoration:none;color:black">                                <h5> {{ $cn->title }}</h5>
                                <img src="{{ asset('images/'.$cn->image) }}" style="width:100%;height:100%"><br>
                                  @php
                                    //  echo $a= nl2br_limit($cn->post,20);

                                  @endphp
                                  {!! Str::limit(strip_tags($cn->post), 90) !!}
                        </div><hr>
                            </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
