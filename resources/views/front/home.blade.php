@extends('layouts.blog-home')

@section('content')
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @if ($posts)
                @foreach ($posts as $post)
                    <h2>
                        <a href="#">{{ $post->title }}</a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php">{{ $post->user->name }}</a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at->diffForHumans() }}</p>
                    <hr>
                    <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'images/icon-pad.png' }}" alt="">
                    <hr>
                    <p>{!! str_limit($post->body, 200) !!}</p>
                    <a class="btn btn-primary" href="/post/{{ $post->slug }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                @endforeach
                <hr>
                <!-- Pagination -->
                <div class="text-center" id="divcount">{{ $posts->render() }}</div>
            @endif
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

@endsection
