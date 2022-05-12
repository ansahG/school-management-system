@extends('layouts.administrator')

@section('content')
		
		<div class="container">
			<div class="row">
				@forelse($classes as $class)
					<div class="col-sm-6 col-md-3">
						<a href="{{ route('viewClass', $class->class) }}" class="card text-center py-4 text-decoration-none"> {{ $class->class }} <br> 
							<small> ({{ $class->AKA }}) </small>
						</a href="">
					</div>
					@empty
					Im prety sure there is nothing 
				@endforelse
			</div>
		</div>

@endsection