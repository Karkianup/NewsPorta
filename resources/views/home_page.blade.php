@extends('layouts.app')
@section('content')

         <a href="news/create"  class="btn btn-info" style="position:absolute;right:1%;font-weight:bold;font-size:23px;text-decoration:none;color:black">Post Article</a><br>

         <form action="/" method="POST">
            @csrf
                <select name="searchCategory">
                     <option selected disabled>filter</option>
                        {{-- @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->id }}</option>

                        @endforeach --}}
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>

                </select>
                <input type="submit" value="submit" name="newsFilter">
         </form>

         @if(isset($_POST['newsFilter']))
         {{-- <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="card">
                            <div class="card-body">
                        @foreach ($newsDetails as $d)
                            <a href={{ "/news/". $d->id }} style="text-decoration: none">
                            <h1 style="color:Black;font-weight:bold">{{ $d->title }}</h1> <br>
                            <img src={{"images/".$d->image  }} width="500px" height="300px"><br><br>
                            <hr style="width:1000px;height:6px;">
                            </a>

                        @endforeach
                            </div>
                    </div>

                </div>

            </div>

         </div> --}}
           {{ "My name is Bhagya neupane" }}

         @else


        @if (session('message'))
                <div class="alert alert-primary" style="text-align:center">{{ session('message') }}</div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="card">
                            <div class="card-body">
                        @foreach ($newsDetails as $d)
                            <a href={{ "/news/". $d->id }} style="text-decoration: none">
                            <h1 style="color:Black;font-weight:bold">{{ $d->title }}</h1> <br>
                            <img src={{"images/".$d->image  }} width="500px" height="300px"><br><br>
                            <hr style="width:1000px;height:6px;">
                            </a>

                        @endforeach
                            </div>
                    </div>

                </div>

            </div>

         </div>
        @endif
@endsection
