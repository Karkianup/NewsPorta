{{-- @extends('layouts.dashboard')
@section('body')
<div class="container showMessage">
    <div class="row">
        <div class="col-5">

            @foreach ($messages as $message)
                {{ $message->message }}
            @endforeach
        </div>
    </div>

</div>


@endsection --}}

@foreach ($messages as $message)
    {{ $message->message }}

@endforeach
@foreach ($replies as $reply)
 {{ $reply->message }}
@endforeach
