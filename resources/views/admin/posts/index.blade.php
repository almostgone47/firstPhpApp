@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

	    <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

	<h1>Posts</h1>

	<table class="table">
		<thead>
			<tr>
				<td>Id</td>
				<td>Photo</td>
				<th>Posted By</th>
				<th>Category</th>
        <th>Title</th>
				<th>Body</th>
				<th>Created at</th>
        <th>Updated at</th>
			</tr>
		</thead>
		<tbody>
		@if($posts)
			@foreach($posts as $post)
			<tr>
				<td>{{ $post->id }}</td>
				<td><img src="/images/{{ $post->photo ? $post->photo->file : 'noimg.jpg' }}" alt="photo of user" class="img-rounded" height="50px"></td>
				<td>{{ $post->user->name }}</td>
				<td>{{ $post->category->name }}</td>
				<td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
				<td>{{ $post->body }}</td>
				<td>{{ $post->created_at->diffForHumans() }}</td>
				<td>{{ $post->updated_at->diffForHumans() }}</td>
			</tr>
			@endforeach
		@endif
		</tbody>
	</table>


@stop