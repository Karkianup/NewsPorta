@extends('layouts.dashboard')
@section('contents')
  <div class="container userProfile">
      <div class="row">
          <h1 style="color:black;position: absolute;left:10%">Profile</h1>

      </div>
      <div class="row">
          <div class="col-8"><br><br><br>
             <img src="{{ asset('userImage/'.$userDetail->image) }}" style="width:400px;border-radius:20%">
            </div>
      </div><br>
      <span style="color:red;font-size:30px">Name:</span><span style="font-size:30px">{{ $userDetail->name }}</span><br>
      <span style="color:red;font-size:30px">email:</span><span style="font-size:30px">{{ $userDetail->email }}</span>


  </div>

@endsection
