
@extends('layouts.administrator')
@section('content')


@livewire('administrator.employees.employee-form', ['employee' => $employee])

@endsection