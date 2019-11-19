@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if ($photos)    
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($photos as $photo)
                  <tr>
                    <th scope="row">{{ $photo->id }}</th>
                    <td><img src="{{ $photo->file }}" alt="" width="100"></td>
                    <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{ $photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                    <td>
                      <form action="{{ route('media.destroy',$photo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr> 
              @endforeach
            </tbody>
          </table>
    @endif

@stop