@extends('layouts.dataTableModules')

@section('content')



@livewire('administrator.classes.student-class-component', ['_class' => $_class])


@endsection