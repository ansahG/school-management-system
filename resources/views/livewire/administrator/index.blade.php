<div class="container">
            <div class="row">
                 <div class="btn btn-primary" style="text-align:center; padding-bottom:15px"> General Log </div>

                   @isset($employeesCount)
                      <div class="col-sm-6 col-md-3">
                        <a href="{{ route('allEmployees') }}" class="card text-center py-4 text-decoration-none"> Total Employees <br> 
                            <h4> {{ $employeesCount }} </h4>
                        </a>
                       </div>
                    @endisset


                   @isset($studentsCount)
                      <div class="col-sm-6 col-md-3">
                        <a href="{{ route('allStudents') }}" class="card text-center py-4 text-decoration-none"> Total Students <br> 
                            <h4> {{ $studentsCount }} </h4>
                        </a>
                       </div>
                    @endisset

                   @isset($classesCount)
                      <div class="col-sm-6 col-md-3">
                        <a href="{{ route('classDeck') }}" class="card text-center py-4 text-decoration-none"> Total Classes <br> 
                            <h4> {{ $classesCount }} </h4>
                        </a>
                       </div>
                    @endisset

                    @isset($upcomingEventsCount)
                      <div class="col-sm-6 col-md-3">
                        <a href="" class="card text-center py-4 text-decoration-none"> Total Events (upcoming)<br> 
                            <h4> {{ $upcomingEventsCount }} </h4>
                        </a>
                       </div>
                    @endisset
            </div>
{{-- accounting row --}}
            <hr style="color:red">

                <div class="row">
                        <div class="btn btn-primary" style="text-align:center; padding-bottom:15px"> Accounting </div>
                        <br>
                   @isset($unapprovedExpenses)
                      <div class="col-sm-6 col-md-3">
                        <a href="{{ route('adminUnapprovedExpenses') }}" class="card text-center py-4 text-decoration-none">  Expenses waiting approval <br> 
                            <h4> {{ $unapprovedExpenses }} </h4>
                        </a>
                       </div>
                    @endisset


                   @isset($approvedExpense)
                      <div class="col-sm-6 col-md-3">
                        <a href="{{ route('adminApprovedExpenses') }}" class="card text-center py-4 text-decoration-none"> Total approved <br> 
                            <h4> {{ $approvedExpense }} </h4>
                        </a>
                       </div>
                    @endisset

                    @isset($projectedSpendings)
                      <div class="col-sm-6 col-md-3">
                        <a href="" class="card text-center py-4 text-decoration-none"> Projected Spendings <br> 
                            <h4> {{ $projectedSpendings }} GHS</h4>
                        </a>
                       </div>
                    @endisset

                    @isset($totalSpent)
                      <div class="col-sm-6 col-md-3">
                        <a href="" class="card text-center py-4 text-decoration-none">  Approved spending <br> 
                            <h4> {{ $totalSpent }} GHS</h4>
                        </a>
                       </div>
                    @endisset
             </div>

</div>