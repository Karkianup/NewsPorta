@extends('layouts.app')
@section('content')
    <div class="container addNews">
            <div class="row">
                <div class="col-4">
                   @if (session('message')) <div class="alert alert-primary">{{ session('message') }}</div> @endif

                    <form action="/news" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                                    <select class="form-select" name="category_id">
                                        @foreach ($categories as $id=>$category)
                                             <option value="{{ $id }}" {{ $id == $newsDetails->category_id ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach

                                    </select><br>
                                    <input type="hidden" name="id" class="form-control" value="{{ $newsDetails->id }}">
                                Title:<input type="text" name="title" class="form-control" value="{{ $newsDetails->title }}"><br>
                                image:<input type="file" name="image"  placeholder="title" class="form-select"><br><hr>
                                    <img src="{{ asset('images/'.$newsDetails->image) }}" height="150px" width="180px"><br><br>
                                Article:<textarea rows="9" cols="30" class="form-control" name="post">
                                            {{ $newsDetails->post }}
                                        </textarea><br>
                                    <input type="submit" value="Update" class="btn btn-success">
                     </form>
                </div>
            </div>
    </div>

@endsection
