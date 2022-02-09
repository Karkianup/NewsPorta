{{-- @extends('layouts.dashboard')
@section('body')
   <div class="container messageIndex">
       <div class="row">
           <div class="col-6">
                <h1 style="text-align: center">Messages</h1><br>
                   @foreach ($messages as $message)
                        @foreach ($message->sender as $senders)
                             <div class="card">
                                <a href={{ "/show/message/".$senders->id }}>
                                    <div class="card-body">
                                        {{ $senders->name }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
           </div>
       </div>
   </div>
@endsection --}}
{{-- @foreach ($messages as $message)
 {{ $message->id }}

@endforeach --}}

