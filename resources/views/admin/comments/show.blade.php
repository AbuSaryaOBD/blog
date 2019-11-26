@extends('layouts.admin')

@section('content')
  
    @if (count($comments) > 0)
        <h1>Comments</h1>
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
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->body }}</td>
                        <td><a href="{{ route('home.post',$comment->post->id) }}">{{ $comment->post->title }}</a></td>
                        <td>
                            @if ($comment->is_active == 1)
                                <form action="{{ route('comments.update',$comment->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Un approve</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('comments.update',$comment->id) }}" method="post">
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
                            <form action="{{ route('comments.destroy',$comment->id) }}" method="post">
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
        <h1 class="text-center">No Comments</h1>
    @endif
@endsection