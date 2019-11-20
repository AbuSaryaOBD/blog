@extends('layouts.blog-post')


@section('content')
    <!-- Title -->
    @if (Session::has('comment_message'))
        <div class="alert alert-success">{{ session('comment_message') }}</div>
    @endif
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>Posted : {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo->file }}" alt="Post Image">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ $post->body }}</p>
    <hr>

    <!-- Blog Comments -->
@if (Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form" action="{{ route('comments.store') }}" method="POST">
            @csrf 
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endif

    <hr>

    <!-- Posted Comments -->
@if (count($comments) > 0)
    <!-- Comment -->
    @foreach ($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64px" class="media-object" src="{{ $comment->file }}" alt="Image">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->author }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </h4>
                <p> {{ $comment->body }} </p>


                @if (count($comment->replies) > 0)
                    @foreach ($comment->replies as $reply)
                        @if ($reply->is_active == 1)
                            <!-- Nested Comment -->
                            <div id="nested-comment" class="media">
                                <a class="pull-left" href="#">
                                    <img height="64px" class="media-object" src="{{ $reply->file }}" alt="Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $reply->author }}
                                        <small>{{ $reply->created_at->diffForHumans() }}</small>
                                    </h4>
                                    <p> {{ $reply->body }} </p>
                                </div>
                            </div><!-- End Nested Comment -->
                        @endif
                    @endforeach
                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right ">Reply</button>
                        <div class="comment-reply col-sm-10">
                            <form action="{{ route('replies.createReply') }}" method="post">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <div class="form-group">
                                    <label for="body"></label>
                                    <textarea name="body" cols="20" rows="1" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn-primary">Reply</button>
                                </div>
                            </form>
                        </div><!--comment-reply-->
                    </div><!--comment-reply-container-->
                @endif
            </div>
        </div>
    @endforeach
@endif

@endsection

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
@endsection