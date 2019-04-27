@extends('layouts.admin')

@section('content')

	<div class='row'>
		
		@include ('shared.errors')
		
	</div>

	<h1>New Category</h1>
	<div class='row'>

		<div class="col-sm-6">

			{!! Form::open(['method'=>'POST', 'action'=>['AdminCategoriesController@store']]) !!}

				<div class="form-group">
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('New Category', ['class'=>'btn btn-primary'])!!}
				</div>

			{!! Form::close() !!}

		</div>

		<div class="col-sm-6">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Category</th>
						<th>Created At</th>
					</tr>
				</thead>
				<tbody>
				@if($categories)
					@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
						<td>{{ $category->created_at ? $category->created_at->diffForHumans() : "NA" }}</td>
					</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>

	</div>
@stop