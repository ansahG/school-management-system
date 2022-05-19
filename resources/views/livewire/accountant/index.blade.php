


    <div class="row">
      <div class="btn btn-primary text-white" style="text-align:center"> Expenses </div>
      <br>
                   @isset($approvedCount)
                      <div class="col-md-3 col-sm-6">
                        <a href="{{ route('approvedExpenses') }}" class="card text-center py-4 text-decoration-none">  Approval  <br> 
                            <h4> {{ $approvedCount }} </h4>
                        </a>
                       </div>
                    @endisset
                    @isset($notApprovedCount)
                      <div class="col-md-3 col-sm-6">
                        <a href="{{ route('unapprovedExpenses') }}" class="card text-center py-4 text-decoration-none"> Awaiting approval  <br> 
                            <h4> {{ $notApprovedCount }} </h4>
                        </a>
                       </div>
                    @endisset

                     @isset($projectedSpendings)
                      <div class="col-md-3 col-sm-6">
                        <a href="" class="card text-center py-4 text-decoration-none"> Projected Spendings <br> 
                            <h4> GHS {{ $projectedSpendings }} </h4>
                        </a>
                       </div>
                    @endisset

                    @isset($totalSpent)
                      <div class="col-md-3 col-sm-6">
                        <a href="" class="card text-center py-4 text-decoration-none">  Approved spending <br> 
                            <h4> GHS {{ $totalSpent }} </h4>
                        </a>
                       </div>
                    @endisset
    </div>

     <div class="row" style="padding-top:20px">
      <div class="btn btn-primary text-white" style="text-align:center"> School Fees </div>
      <br>

                     @isset($studentWhoPaid)
                      <div class="col-md-3 col-sm-6">
                        <a href="{{ route('loadClassForFees') }}" class="card text-center py-4 text-decoration-none"> # Student paid  <br> 
                            <h4> {{ $studentWhoPaid }} </h4>
                        </a>
                       </div>
                    @endisset

                     @isset($totalFees)
                      <div class="col-md-3 col-sm-6">
                        <a href="{{ route('loadClassForFees') }}" class="card text-center py-4 text-decoration-none">  Total Fees   <br> 
                            <h4>GHS {{ $totalFees }} </h4>
                        </a>
                       </div>
                    @endisset

                     @isset($totalFees , $totalSpent)
                      <div class="col-md-3 col-sm-6">
                        <a href="{{ route('loadClassForFees') }}" class="card text-center py-4 text-decoration-none">  Approves Expense to Fees payed <br> 
                            <h4> {{ $totalFees - $totalSpent }} </h4>
                        </a>
                       </div>
                    @endisset
                   
    </div>

{{-- event role start from here --}}

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
{{-- event row ends here --}}




























    {{-- danger zone --}}
      <div class="row" style="padding-top:20px" style="padding:10rem">
      <div class="btn btn-danger text-white" style="text-align:center" data-toggle="tooltip" data-placement="top" title="Be careful around this zone, data lost from here cant be recovered">    
        Vacation Tab
      </div>
      <br>

                    
                      <div class="col-md-8 col-sm-12">
                        <a href=""class="card text-center py-4 text-decoration-none">  <br> 
                            Coming soon
                        </a>
                       </div>
   
    </div>