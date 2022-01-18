@extends('layouts.dashboard')
@section('body')
  <div class="container userProfile">
      <div class="row">
          <h1 style="color:black;position: absolute;left:2%">Profile</h1>

      </div>
      <div class="row">
          <div class="col-8"><br><br><br>
             <img src="{{ asset('userImage/'.$userDetail->image) }}" style="width:200px;border-radius:20%">
            </div>
      </div><br>
      <span style="color:red;font-size:30px">Name:</span><span style="font-size:30px">{{ $userDetail->name }}</span><br>
      <span style="color:red;font-size:30px">email:</span><span style="font-size:30px">{{ $userDetail->email }}</span><br>
      <span style="color:red;font-size:30px">Total Posts:</span><span style="font-size:30px">{{ $count }}</span>

  </div>

@endsection
