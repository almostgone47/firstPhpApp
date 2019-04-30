@if(count($messages) > 0)

	<div class="alert alert-success">
		
		<ul>
			
			@foreach($messages->all() as $message)

				<li>{{ $message }}</li>

			@endforeach

		</ul>

	</div>

@endif