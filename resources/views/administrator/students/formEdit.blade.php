@extends('layouts.administrator')

@section('content')

	@livewire('administrator.students.student-form', ['student' => $student])

	<div class="container">
		<div class="container" style="vertical-align: flex; text-align: center;max-width: 14rem;">
			  <img src="{{ asset('/storage/studentAvatars/'.$student->_studentAvatar) }}" style="max-width:100%;">
 		</div>
	</div>

@endsection



 