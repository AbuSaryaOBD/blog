@extends('layouts.admin')

@section('content')
  
    @if (count($replies) > 0)
        <h1>replies</h1>
        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
                <th>Approval</th>
                <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                    <tr>
                        <td>{{ $reply->id }}</td>
                        <td>{{ $reply->author }}</td>
                        <td>{{ $reply->email }}</td>
                        <td>{{ $reply->body }}</td>
                        <td><a href="{{ route('home.post',$reply->comment->post->id) }}">{{ $reply->comment->post->title }}</a></td>
                        <td>
                            @if ($reply->is_active == 1)
                                <form action="{{ route('replies.update',$reply->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Un approve</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('replies.update',$reply->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </div>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('replies.destroy',$reply->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No replies</h1>
    @endif
@endsection