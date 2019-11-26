@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if ($photos) 
      <form action="{{ route('media.delete') }}" method="post" class="form-inline">
        @csrf
        @method('DELETE')
        <div class="form-group">
          <select name="checkBoxArray" class="form-control">
            <option value="delete">Delete</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Go</button>
        </div>

        <table class="table table-hover">
            <thead>
              <tr>
                <th><input type="checkbox" id="options"></th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($photos as $photo)
                  <tr>
                    <td><input type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}" class="checkBoxes"></td>
                    <td scope="row">{{ $photo->id }}</td>
                    <td><img src="{{ $photo->file }}" alt="" width="100"></td>
                    <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{ $photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                    <td>
                      <div class="form-group">
                        <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                      </div>
                    </td>
                  </tr> 
              @endforeach
            </tbody>
          </table>
        </form> 
    @endif

@stop

@section('scripts')
  <script>
    $(document).ready(function(){
      $('#options').click(function(){
        var chkState = this.checked;
        $('.checkBoxes').each(function(){
          this.checked = chkState;
        });
      });
    })
  </script>
@endsection