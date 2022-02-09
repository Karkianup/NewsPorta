@extends('layouts.dashboard')
@section('body')
  <div class="container viewDeletedItems">
      <div class="rows">
          <div class="col-4">
              @if($deletedItems->count())
                    <table border="2px" class="table-bordered">
                            <tr style="background-color:black;color:white ">
                                <th>Title</th>
                                <th>Image</th>
                                <th>Article</th>
                                <th>deleted_at</th>
                                <th>Restore</th>

                            </tr>
                                @foreach ($deletedItems as $deletedItem)
                                    <tr>
                                        <td>{{ $deletedItem->title }}</td>
                                        <td> <img src="{{ asset('images/'.$deletedItem->image) }}" alt="image" width="200px"> </td>
                                        <td>{{ Str::limit($deletedItem->post,10) }}</td>
                                        <td>{{ $deletedItem->deleted_at->diffForHumans() }}</td>
                                        <td><a class="btn btn-primary" type="button" href={{'/restore/deleted/item/'.$deletedItem->id}}>Restore</a></td>

                                    </tr>

                                @endforeach

                    </table>
                @else
                   <div class="alert alert-warning">No deleted Items</div>
                @endif
          </div>
      </div>
  </div>

@endsection

