@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@stop

@section('content')

	<h1>Upload</h1>
	<div class='row'>

		<div class="col-sm-6">

			{!! Form::open(['method'=>'POST', 'action'=>['AdminMediasController@store'], 'class'=>'dropzone']) !!}

			{!! Form::close() !!}
		</div>

	</div>
@stop

@section('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@stop