@extends('layouts.admin')

@include ('shared.errors')

@section('content')

	<h1>Edit Post</h1>

	<div class="row">
		<div class="col-sm-4">
			<img src="/images/{{ $post->photo ? $post->photo->file : 'noimg.jpg' }}" alt="photo of illustration" class="img-responsive" >
		</div>
	
		<div class="col-md-8">
			{!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id ], 'files'=>true ]) !!}

				<div class="form-group">
					{!! Form::label('title', 'Title:') !!}
					{!! Form::text('title', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('category_id', 'Category:') !!}
					{!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('photo_id', 'Photo') !!}
					{!! Form::file('photo_id', ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('body', 'Body:') !!}
					{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>"3"]) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Edit Post', ['class'=>'btn btn-primary'])!!}
				</div>

			{!! Form::close() !!}

			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id] ]) !!}

				<div class="form-group">
					{!! Form::submit('Delete Post', ['class'=>'btn btn-danger'])!!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@stop