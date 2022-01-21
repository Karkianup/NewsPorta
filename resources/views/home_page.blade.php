@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-primary" style="text-align:center">{{ session('message') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <div class="card-header" style="background-color:#5D5C61;border:none">
               {{-- For search news using category --}}
                <form action="/" method="GET" class="searchCategory">
                    <select name="searchCategory" class="form-select">
                        <option selected disabled>filter</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="search" class="btn btn-dark">
                </form>

                {{-- search using search field --}}
                <form action="/" method="GET" class="searchBar">
                    <input type="text" name="searchBar" placeholder="enter title" class="form-control">
                    <input type="submit" value="search" class="btn btn-dark">
                </form>
               </div><br><br>

                <form class="latestSearch">
                    <select name="search">
                        <option selected disabled>search</option>
                        <option value="1">Latest</option>
                        <option value="2">Oldest</option>

                    </select>
                    <input type="submit" value="search" class="btn btn-dark">
                </form>


        </div><br><br>
        <div class="row">
            @if ($newsDetails->count())
                @foreach ($newsDetails as $d)

                    <div class="col-6">
                        <div class="card mt-4 ms-4">
                            <div class="card-body">
                                <a href={{ '/news/' . $d->id }} style="text-decoration: none;color:black">
                                    <h3 style="color:white;background-color:black;padding:20px">{{ $d->title }}</h3><hr>
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
