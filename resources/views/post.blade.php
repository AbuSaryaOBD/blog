@extends('layouts.blog-home')


@section('content')
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- Title -->
            @if (Session::has('comment_message'))
                <div class="alert alert-success"><p class="text-center">{{ session('comment_message') }}</p></div>
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
            <p class="lead">{!! $post->body !!}</p>
            <hr>



            {{-- <div id="disqus_thread"></div>
            <script>
            
            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */



            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://abusarya.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            <script id="dsq-count-scr" src="//abusarya.disqus.com/count.js" async></script>
            --}}


                
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

@endsection
{{-- 
@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
@endsection --}}