@extends('layouts.app')
@section('content')

         <a href="news/create"  style="position:absolute;right:1%;font-weight:bold;font-size:23px;text-decoration:none;color:red">Post Article</a><br>


                    @if (session('message'))
                          <div class="alert alert-primary" style="text-align:center">{{ session('message') }}</div>
                    @endif
      <div class="container">
        <div class="row">
           <div class="col-5">

<div class="card">
<div class="card-body">

                @foreach ($newsDetails as $d)

                        <a href={{ "/news/". $d->id }} style="text-decoration: none">
                          <h1 style="color:Black;font-weight:bold">{{ $d->title }}</h1> <br>
                          <img src={{"images/".$d->image  }} width="300px" height="200px"><br><br>
                          <hr style="width:430px;height:6px;">
                        </a>

                @endforeach
            </div>
        </div>

           </div>

         </div>

     </div>
         {{-- @foreach ($newsDetails as $d)
             {{ $d->name }}
             @foreach ($d->newsDetails as $a)
               {{ $a->title }}

             @endforeach

         @endforeach --}}
@endsection
