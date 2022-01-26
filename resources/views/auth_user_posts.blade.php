@extends('layouts.dashboard')
@section('body')
    <div class="container userArticle">
        <div class="row">
            {{-- <div class="col-6"></div> --}}
            {{-- @foreach ($authPosts as $d)

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

            @endforeach --}}
            <div class="col-10">
                <a href="/restore/delete">restore</a>
                @if(session('message'))<div class="alert alert-danger">{{ session('message') }}</div>@endif
                <table border="1px" class="table table-bordered table-hover">
                    <tr style="color:white;background-color:black">
                        <th>Title</th>
                        <th>Image</th>
                        <th>Article</th>
                        <th>Created</th>
                        <th>Update</th>
                        <th>Delete</th>

                    </tr>
                    <tr>
                        @foreach ($authPosts as $d)
                            <td><b>{{ $d->title }}</b></td>
                            <td><img src="{{asset('images/'.$d->image) }}" width="200px"></td>
                            <td>{{ Str::limit($d->post,50) }}</td>
                            <td> {{ date_format($d->created_at,'D M Y') }} </td>
                            <td><a href={{"/news/edit/".$d->id}} class="btn btn-primary">Update</a></td>
                            <td><a href={{"/news/delete/".$d->id}} class="btn btn-danger">Delete</td>
                        </tr>

                        @endforeach
                </table>
            </div>

        </div>

    </div>

@endsection

{{-- {{ date_format($newsDetails->created_at,'D M Y') }} --}}
