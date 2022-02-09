@extends('layouts.dashboard')
@section('body')
 <div class="container favourite">
     <div class="row">
         <div class="col-5">
            @if($favorites->count())
                <table class="border">
                    <table border="1px" class="table table-bordered table-hover">
                        <tr style="color:white;background-color:black">
                            <th>Title</th>
                            <th>Image</th>
                            <th>Article</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            @foreach ($favorites as $f)
                                <td>{{ $f->title }}</td>
                                <td><img src="{{ asset('images/'.$f->image) }}" style="height:50px;width:50px;"></td>
                                <td>{{ Str::limit($f->post,20) }}</td>
                                <td><a href="#" class="btn btn-danger">DELETE</a></td>
                            @endforeach

                        </tr>

                </table>
            @else
                <div class="alert alert-warning">No favourites added</div>
            @endif
         </div>
     </div>
 </div>
@endsection
