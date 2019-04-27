@extends('layouts.admin')

@section('content')

	<h1>Categories</h1>

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
@stop