@if(count($errors) > 0)

	<div class="alert alert-danger">
		
		<h3>The following errors kept your user from being created:</h3>
		<ul>
			
			@foreach($errors->all() as $error)

				<li>{{ $error }}</li>

			@endforeach

		</ul>

	</div>

@endif