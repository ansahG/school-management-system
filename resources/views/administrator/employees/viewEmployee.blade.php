
@extends('layouts.administrator')
@section('content')

	<div class="container">
		{{-- student row ends here --}}
		<div class="row">
			{{-- <div class="col-4">
				<img src="{{ asset('/storage/studentAvatars/'.$admin_student->_studentAvatar) }}" style="max-width: 80%;">
			</div> --}}
			<div class="col-8">
				<div class="row">
					<h4 class="col-6 card rounded-corners shadow">
						 Name: {{ $employee->name }}
					</h4>
				
					<h4 class="col-6 card rounded-corners">
						Email: {{ $employee->email }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						ID: {{ $employee->_ghanaCard }}
					</h4>
					
					<h4 class="col-6 card rounded-corners">
						Date Started : {{ $employee->_dateStarting }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Phone : {{ $employee->_phone }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Department: {{ $employee->_department }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Salary: {{ $employee->_salary }}
					</h4>
				</div>
			</div>
		</div>	{{-- student row ends here --}}

			
	
	</div>


		@livewire('administrator.employees.trash-employee', ['employee' => $employee])


		

@endsection
		