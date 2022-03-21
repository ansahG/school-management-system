
@extends('layouts.headTeacher')
@section('content')

	<div class="container">
		{{-- student row ends here --}}
		<div class="row">
			<div class="col-4">
				<img src="{{ asset('/storage/studentAvatars/'.$admin_student->_studentAvatar) }}" style="max-width: 80%;">
			</div>
			<div class="col-8">
				<div class="row">
					<h4 class="col-6 card rounded-corners shadow">
						First Name: {{ $admin_student->_firstName }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Last Name: {{ $admin_student->_lastName }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Othernames: {{ $admin_student->_otherNames }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Birthdate: {{ $admin_student->_birthDate }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						ID: {{ $admin_student->_ghanaCard }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Gender: {{ $admin_student->_gender }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						Religion: {{ $admin_student->_religion }}
					</h4>
					<h4 class="col-6 card rounded-corners">
						{{ $studentClass }}
					</h4>
				</div>
					<div class="col-12">
						{{ $admin_student->_moreInfo }}
					</div>
			</div>
		</div>	{{-- student row ends here --}}

				<h3 style="text-align: center"> Parent Information </h3>	
				{{-- parent row starts here --}}
		<div class="row">
			<div class="col-6">
				Parent Name: {{ $admin_student->_parentName }}
			</div>
			<div class="col-6">
				Parent Email: <a href="mailto:{{ $admin_student->_parentEmail }}"> {{ $admin_student->_parentEmail }}</a>
			</div>
			<div class="col-6">
				Parent phone: <a href="tel:{{ $admin_student->_parentPhone }}"> {{ $admin_student->_parentPhone }} </a>
			</div>
			<div class="col-6">
				Parent Ghana Id: {{ $admin_student->_parentGhanaCard }}
			</div>
		</div> {{-- parent row ends here --}}
	
	</div>


		@livewire('head-teacher.students.trash-student', ['student' => $admin_student])


		 accounting information 


		 report card here

@endsection
		 a a modal  top delete this student please.

		 The student will not be deleted right away but moved to trash()
		 At trash one is allowed to return satudent to mainstream


		 In trash, student can then be made to be delted by all means from the system