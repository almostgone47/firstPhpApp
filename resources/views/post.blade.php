@extends('layouts.blog-post')

@section('content')

    @if(Session::has('comment_message'))

        {{ session('comment_message')}}

    @endif

  <h1>{{ $post->title }}</h1>

  <!-- Author -->
  <p class="lead">
      by <a href="#">{{ $post->user->name }}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted  {{ $post->created_at->diffForHumans() }}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-responsive" src="/images/{{ $post->photo->file }}" alt="">

  <hr>

  <!-- Post Content -->
  <p class="lead">{{ $post->body }}</p>

  <hr>

  <!-- Blog Comments -->
    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST', 'action'=>['CommentsController@store']]) !!}

            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>"3"]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Comment', ['class'=>'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
    </div>
    @endif
    
    <hr>

    <!-- Posted Comments -->
    @if(count($comments) > 0)
        @foreach($comments as $comment)
    <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="/images/{{ $comment->user->photo->file }}" alt="" height="64px">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </h4>
                <p>{{ $comment->body }}</p>
            @foreach($comment->replies as $reply)
                <div class="media " id="nested-comment">
              <a class="pull-left" href="#">
                  <img class="media-object" src="/images/{{ $reply->user->photo->file }}" alt="" height="64">
              </a>
              <div class="media-body">
                  <h4 class="media-heading">{{ $reply->user->name }}
                      <small>{{ $reply->created_at }}</small>
                  </h4>
                        <p> {{ $reply->body }}}</p>
            @endforeach
                    @if(Auth::check())
                    <!-- Comment Replies Form -->
                    <div class="well">
                        <h4>Reply:</h4>
                        {!! Form::open(['method'=>'POST', 'action'=>['CommentRepliesController@store']]) !!}

                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                            <div class="form-group">
                                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>"2"]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Comment', ['class'=>'btn btn-primary'])!!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                    @endif
              </div>
          </div>
            </div>
        </div>
        @endforeach
    @endif

@stop