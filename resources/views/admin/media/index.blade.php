@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if ($photos) 
      <form action="{{ route('media.delete') }}" method="post" class="form-inline">
        @csrf
        @method('DELETE')
        <div class="form-group">
          <select name="checkBoxArray" class="form-control">
            <option value="">Delete</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary ml-1" name="delete_all" value="Go">
        </div>

        <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center"><input type="checkbox" id="options"></th>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Created</th>
                <th class="text-center">Updated</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($photos as $photo)
                  <tr>
                    <td class="align-middle text-center"><input type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}" class="checkBoxes"></td>
                    <td class="align-middle text-center">{{ $photo->id }}</td>
                    <td class="align-middle text-center"><img src="{{ $photo->file }}" alt="" width="75px" height="75px"></td>
                    <td class="align-middle text-center">{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td class="align-middle text-center">{{ $photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
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