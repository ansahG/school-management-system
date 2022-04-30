
@extends('layouts.dataTableModules')
  
@section('content')

<div>
		
		 <div class="card">
              <div class="card-header">
                <h3 class="card-title center"> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Event </th>
                    <th> Date </th>
                   <th>In charge</th>
                   <th> Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @forelse($events as $event)
                  <tr>
                    <td style="font-style: bold"> {{ $event->_eventName }} </td>

                    <td style="font-style: bold"> {{ $event->_eventDate }} </td>
            
                     <td style="font-style: bold"> {{ $event->user->name ?? ' '}} </td>

                    <td> <a href="{{ route('editEvent', $event->_eventName) }}" class="btn btn-success text-white"> V/E </a>

                    @livewire('administrator.event.delete-event', ['event' => $event]) 
                    </td>


                    @empty
                    Nothing to show. 
             @endforelse
          

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

	</div>

  
@endsection