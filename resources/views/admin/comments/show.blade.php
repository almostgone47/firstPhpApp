@extends('layouts.admin')

@section('content')

	@if(count($comments) > 0)
	<h1>Comments</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Author</th>
        <th>Email</th>
				<th>Body</th>
				<th>Created at</th>
				<th>Original Post</th>
        <th>More Comments</th>
			</tr>
		</thead>
		<tbody>
			@foreach($comments as $comment)
			<tr>
				<td>{{ $comment->id }}</td>
				<td>{{ $comment->user->name }}</td>
				<td>{{ $comment->user->email }}</td>
				<td>{{ $comment->body }}</td>
				<td>{{ $comment->created_at->diffForHumans() }}</td>
				<td><a href="{{ route('home.post', $comment->post->id)}}">View Post</a></td>
				<td><a href="{{ route('replies.show', $comment->id )}}"> View Replies</a></td>
			</tr>
			@endforeach
		@else

			<h1 class="text-centered">No Comments</h1>

		@endif
		</tbody>
	</table>


@stop