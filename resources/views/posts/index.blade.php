@extends('layouts.app')

@section('content')

    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- First Blog Post -->
    @if($posts)
        @foreach($posts as $post)
            <h2>
                <a href="#">{{ $post->title }}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{ $post->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <img class="img-responsive" src="/images/{{ $post->photo->file }}" alt="">
            <hr>
            <p>{{ str_limit($post->body, 80) }}</p>
            <a class="btn btn-primary" href="posts/{{ $post->id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endforeach
    <hr>

    <!-- Pagination -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $posts->render() }}
        </div>
    </div>
    @endif
@endsection