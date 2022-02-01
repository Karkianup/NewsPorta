@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="row">
        @foreach ($tags->newsDetails as $tag)
            <div class="col-5">
                  <div class="card">
                      <div class="card-body">
                            <h3>{{ $tag->title }}</h3>
                            <a href={{ "/news/".$tag->id }}> <img src="{{ asset('images/'.$tag->image) }}" style="height:100px;width:100px">
                            <span style="color:black"> {!! Str::limit(strip_tags($tag->post), 90) !!}</a></span>
                      </div>
                  </div>
           </div>
           @endforeach

        </div>
   </div>

@endsection
