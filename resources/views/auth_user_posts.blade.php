

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-11">
                <div class="card">
                        <div class="card-body">
                    @foreach ($authPosts as $d)
                        <a href={{ "/news/". $d->id }} style="text-decoration: none">
                        <h1 style="color:Black;font-weight:bold">{{ $d->title }}</h1> <br>
                        <img src={{asset("images/".$d->image)  }} width="500px" height="300px"><br><br>
                        <hr style="width:1000px;height:6px;">
                        </a>

                    @endforeach
                        </div>
                </div>

            </div>

        </div>

    </div>

@endsection
