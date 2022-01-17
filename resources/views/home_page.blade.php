@extends('layouts.app')
@section('content')

        <a href="news/create"  class="btn btn-dark" style="position:absolute;right:1%;font-weight:bold;font-size:23px;text-decoration:none;color:WHITE">+</a><br>

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

        @if (session('message'))
              <div class="alert alert-primary" style="text-align:center">{{ session('message') }}</div>
        @endif



    <div class="container">
        <div class="row">
            @foreach ($newsDetails as $d)
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <a href={{ "/news/". $d->id }} style="text-decoration: none">
                            <h1 style="color:Black;font-weight:bold">{{ $d->title }}</h1>
                            <img src={{"images/".$d->image  }} width="100%" height="300px">
                            </a>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
 @endsection
