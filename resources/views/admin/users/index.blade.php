@extends('layouts.admin')




@section('content')

	<h1>Users</h1>

	<table class="table">
		<thead>
			<tr>
				<td>Photo</td>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active?</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
		@if($users)
			@foreach($users as $user)
			<tr>
				<td><img src="/images/{{ $user->photo ? $user->photo->file : 'noimg.jpg' }}" alt="photo of user" class="img-rounded" height="50px"></td>
				<td>{{ $user->id }}</td>
				<td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->role->name }}</td>
				<td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
				<td>{{ $user->created_at->diffForHumans() }}</td>
				<td>{{ $user->updated_at->diffForHumans() }}</td>
			</tr>
			@endforeach
		@endif
		</tbody>
	</table>


@stop