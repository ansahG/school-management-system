@extends('layouts.administrator')

@section('content')

	@livewire('administrator.students.student-form', ['student' => null])

@endsection