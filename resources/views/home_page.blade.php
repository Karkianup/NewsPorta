@extends('layouts.app')
@section('content')

         <a href="news/create"  class="btn btn-info" style="position:absolute;right:1%;font-weight:bold;font-size:23px;text-decoration:none;color:black">Post Article</a><br>

         {{-- For search news using category --}}
         <form action="/" method="POST">
            @csrf
                <select name="searchCategory">
                     <option selected disabled>filter</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                </select>
                <input type="submit" value="submit" name="newsFilter" class="btn btn-primary">
         </form>
         {{-- To view using logged in publisher's post --}}
        <div class="searchLoggedUserArticleButton">
            @if(auth()->check())
            <form action="/" method="POST">
                @csrf
                <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                    <input type="submit" value="view your article" class="btn btn-success" name="searchLoggedUserArticle">
            </form>
            @endif
        </div>

         @if (session('message'))
              <div class="alert alert-primary" style="text-align:center">{{ session('message') }}</div>
         @endif

         @if(isset($_POST['newsFilter'])||isset($_POST['searchLoggedUserArticle']))
                <div class="container">
                    <div class="row">
                        <div class="col-11">
                            <div class="card">
                                    <div class="card-body">
                                @foreach ($newsArticles as $d)
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

        @else

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
