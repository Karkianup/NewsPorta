@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($authPosts as $d)

                <div class="col-6">
                    <div class="card mt-4 ms-4">
                            <div class="card-body">
                                <a href={{ "/news/". $d->id }} style="text-decoration: none">
                                    <h1 style="color:Black;font-weight:bold">{{ $d->title }}</h1> <br>
                                    <img src={{asset("images/".$d->image)  }} width="500px" height="300px"><br><br>
                                </a>

                            </div>
                    </div>

                </div>

            @endforeach

        </div>

    </div>

@endsection
