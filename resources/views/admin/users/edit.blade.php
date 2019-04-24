@extends('layouts.admin')

@section('content')

	<div class='row'>
		
		@include ('shared.errors')
		
	</div>


	<h1>Edit User</h1>

	<div class="col-sm-3">
		
		<img src="/images/{{ $user->photo ? $user->photo->file : 'noimg.jpg' }}" alt="photo of user" class="img-responsive img-rounded">

	</div>

	<div class="col-sm-9">

		{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true ]) !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'Email:') !!}
				{!! Form::text('email', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('role_id', 'Role:') !!}
				{!! Form::select('role_id',  $roles, null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('is_active', 'Status:') !!}
				{!! Form::select('is_active', array( 1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('photo_id', 'Photo ID') !!}
				{!! Form::file('photo_id', ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Edit User', ['class'=>'btn btn-primary'])!!}
			</div>

		{!! Form::close() !!}

	</div>

@stop