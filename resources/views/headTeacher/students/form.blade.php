@extends('layouts.headTeacher')

@section('content')

	@livewire('head-teacher.students.student-form', ['student' => null])

@endsection