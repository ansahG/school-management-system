
@extends('layouts.headTeacher')
@section('content')


@livewire('headteacher.employees.employee-form', ['employee' => $employee])

@endsection