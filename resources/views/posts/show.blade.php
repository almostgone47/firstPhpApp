@extends('layouts.app')

@section('content')

    @if(Session::has('comment_message'))

        {{ session('comment_message')}}

    @endif

  <h1>{{ $post->title }}</h1>

  <p class="lead">
      by <a href="#">{{ $post->user->name }}</a>
  </p>

  <hr>

  <p><span class="glyphicon glyphicon-time"></span> Posted  {{ $post->created_at->diffForHumans() }}</p>

  <hr>

  <img class="img-responsive" src="/images/{{ $post->photo->file }}" alt="">

  <hr>

  <p class="lead">{{ $post->body }}</p>

  <hr>

  <!-- Blog Comments -->
    @if(Auth::check())
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
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="{{ Auth::user()->gravatar }}" alt="" height="64px">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </h4>
                <p>{{ $comment->body }}</p>
                @foreach($comment->replies as $reply)
                    @if($reply->is_active == 1)
                    <div class="media " id="nested-comment">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{ Auth::user()->gravatar }}" alt="" height="64">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $reply->user->name }}
                            <small>{{ $reply->created_at }}</small>
                            </h4>
                            <p> {{ $reply->body }}}</p>
                    @endif
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
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    @endif
@endsection