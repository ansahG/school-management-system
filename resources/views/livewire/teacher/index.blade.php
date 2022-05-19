
        
      <div class="container">
            <div class="row">
                @forelse($classes as $class)
                    <div class="col-3" style="background-color: red !important">
                        <a href="{{ route('classAssessment', $class->class) }}" class="card text-center text-decoration-none"> {{ $class->class }} <br> 
                            <small> ({{ $class->AKA }}) </small>
                        </a href="">
                    </div>
                    @empty
            <h3 style="color:red">    No registered class yet   </h3>
                @endforelse
            </div>
        </div>

<br>
<br>
<br>


@if($events->count() >= 1)

        <div class="row">

           <div class="btn btn-danger text-white" style="text-align:center; padding-bottom:15px"> Event Board </div>
                        <br>

                @if($employeeEvent->count() >= 1)
                        <div style="text-align: center;">
                          <button class="btn btn-info text-white"> Events under my control </button>
                        </div>
                  @endif

            @forelse($employeeEvent as $event)
               <div class="col-sm-6 col-md-3" style="text-align:center; color:blue; border-style: dotted;" data-bs-toggle="tooltip" data-bs-placement="top"data-bs-custom-class="custom-tooltip"  title="Over View : {{ $event->_eventDescription }}">
                        <p href="" class="card text-center py-4 text-decoration-none" style="text-align:center"> <h2> {{ $event->_eventName }}  </h2>   <br> 
                            <small style="font-weight:bold;"> {{ $event->_eventDate}} ( {{ $event->_time }} ) </small> <br>
                            <small style="font-weight:bold; color:red"> GHS {{ $event->_ticketPricing }} </small>
                        </p>
                </div>
                @empty
                       
            @endforelse
                    

                       <hr style="color:red"> 

                        <div style="text-align: center;">
                          <button class="btn btn-info text-white"> Others </button>
                        </div>

                        {{-- general events tab --}}
                    @forelse($events->where('user_id', '!=' ,auth()->user()->id) as $event)
                      <div class="col-sm-6 col-md-3" style="text-align:center;" data-bs-toggle="tooltip" data-bs-placement="top"data-bs-custom-class="custom-tooltip"  title="Over View : {{ $event->_eventDescription }}">
                        <p href="" class="card text-center py-4 text-decoration-none" style="text-align:center"> <h2> {{ $event->_eventName }}  </h2>   <br> 
                            <small style="font-weight:bold;"> {{ $event->_eventDate}} ( {{ $event->_time }} ) </small>
                            <small style="font-weight:bold;"> GHS {{ $event->_ticketPricing }} </small>
                        </p>
                       </div>
                       @empty
                       
                   @endforelse
                  
        </div>
@endif