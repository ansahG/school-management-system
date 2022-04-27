
@extends('layouts.dataTableModules')
	
@section('content')
			

{{-- this is the form and we display it to only admin, this check cos teachwers will also see this page bro--}}
@if(auth()->user()->_department == 'Manager')
  @livewire('head-teacher.event.event' , ['event' => $event ])
@endif

	
@endsection