@extends('layouts.app')
@section('content')

       <div class="card-body">
    <a href="news/create" class="btn btn-dark"
        style="position:absolute;right:1%;font-weight:bold;font-size:23px;text-decoration:none;color:WHITE">+</a><br>

    {{-- For search news using category --}}
    <form action="/" method="GET" class="searchCategory">
        <select name="searchCategory">
            <option selected disabled>filter</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="search" class="btn btn-primary">
    </form>

    {{-- search using search field --}}
    <form action="/" method="GET" class="searchBar">
        <input type="text" name="searchBar" placeholder="enter title">
        <input type="submit" value="search" class="btn btn-primary">
    </form><br><br>
   </div>

    @if (session('message'))
        <div class="alert alert-primary" style="text-align:center">{{ session('message') }}</div>
    @endif

    <div class="container">
        <div class="row">
            @if ($newsDetails->count())
                @foreach ($newsDetails as $d)

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <a href={{ '/news/' . $d->id }} style="text-decoration: none;color:black">
                                    <h3 style="color:black">{{ $d->title }}</h3><hr>
                                    <img src={{ 'images/' . $d->image }} width="100%" height="300px">
                                    <span style="font-weight:bold">Published by:</span><span style="color:red">{{ $d->user->name }}</span><br>
                                    {{ Str::limit($d->post,200) }}

                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            @else
                <div class="alert alert-warning"> No Posts found with matching query</div>
            @endif

        </div>
    </div>
@endsection
