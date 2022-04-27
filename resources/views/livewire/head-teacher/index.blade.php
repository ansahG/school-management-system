<div class="container">
            <div class="row">
                   @isset($employeesCount)
                      <div class="col-3">
                        <a href="{{ route('allEmployees') }}" class="card text-center py-4 text-decoration-none"> Total Employees <br> 
                            <h4> {{ $employeesCount }} </h4>
                        </a>
                       </div>
                    @endisset


                   @isset($studentsCount)
                      <div class="col-3">
                        <a href="{{ route('allStudents') }}" class="card text-center py-4 text-decoration-none"> Total Students <br> 
                            <h4> {{ $studentsCount }} </h4>
                        </a>
                       </div>
                    @endisset

                   @isset($classesCount)
                      <div class="col-3">
                        <a href="{{ route('classDeck') }}" class="card text-center py-4 text-decoration-none"> Total Classes <br> 
                            <h4> {{ $classesCount }} </h4>
                        </a>
                       </div>
                    @endisset

                    @isset($Events)
                      <div class="col-3">
                        <a href="" class="card text-center py-4 text-decoration-none"> Total Events <br> 
                            <h4> {{ $classesCount }} </h4>
                        </a>
                       </div>
                    @endisset


            </div>
        </div>