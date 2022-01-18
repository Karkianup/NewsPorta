@extends('layouts.dashboard')
@section('contents')

    <form action="/news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container addNews">



                        <div class="card">
                            <div class="card-header" style="background-color:black;color:white">
                                <h1 style="font-weight:bold;text-align:center">Enter Article</h1>
                            </div>
                            <div class="card-body">
                            @if(session('message')) <div class="alert-success"> {{ session('message') }} </div>@endif<br>
                            <select name="category_id" class="form-select">
                                <option selected disabled> Choose news category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select><br>
                            @error('title')<div class="alert-danger">{{ "*".$message }}</div> @enderror
                            <input type="text" name="title" placeholder="enter title of your news" class="form-control" value="{{ old('title') }}"><br>

                            @error('image')<div class="alert-danger">{{ "*".$message }}</div> @enderror
                            <input type="file" name="image" placeholder="enter title of your news" class="form-control"><br>

                            @error('post')<div class="alert-danger">{{ "*".$message }}</div> @enderror
                            <textarea name="post" rows="9" cols="30" class="form-control" placeholder="Enter article"></textarea><br>



                            <input type="submit" value="Post" class="btn btn-success">





                    </div>
                </div>
        </div>
    </form>

@endsection
