
<div class="container-fluid text-align-center">
        <form  wire:submit.prevent="saveData">
        {{-- first column begins --}}
        <div> 
            <div class="card-header">
                {{-- <h3 class="card-title" wire:click="addInput"> Add more fields  </h3> --}}
            </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body row">
                  <div class="form-group col-3">
                    <label for="Subject"> Subject </label>
                    <input type="text" class="form-control" id="subject" wire:model="_subject" >
                    @error('_subject')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group col-2">
                    <label for="Class_score"> Class score </label>
                    <input type="number" class="form-control" id="Class_score" wire:model="_classScore" placeholder="50%">
                    @error('_classScore')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group col-2">
                    <label for="Exams_score"> Exams Score </label>
                    <input type="number" class="form-control" id="Exams_score" wire:model="_examsScore" placeholder="50%">
                    @error('_examsScore')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>


                <div class="form-group col-3">
                    <select class="col-12" wire:model="_term">
                    <option > Select Term </option>
                      <option value="1"> Term 1</option>
                      <option value="2"> Term 2</option>
                      <option value="3"> term 3</option>
                    </select>
                    @error('_term')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group col-2">
                 <select class="col-12" wire:model="__class">
                      <option> class</option>
                      @forelse($classes as $class)
                      <option value="{{ $class->class }}"> {{ $class->class }} </option>
                      @empty

                      @endforelse
                   
                  </select>
                    @error('__class_id')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                </div>
                 


                </div>
                <!-- /.card-body -->
              
        </div>

            @if($_classScore > 50 || $_examsScore > 50)
              <h3 style="color:red"> You are breaking the score rule. check scores again!</h3>
            @else
              <div class="">
                  <button type="submit" class="btn btn-primary text-white">Submit</button>
              </div>
            @endif

    </form>
</div>          

<br>
{{-- 
<div class="container-fluid">
  <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Class </th>
                    <th>Class </th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse()

                  <tr>
                    <td style="font-style: bold"> lll </td>
                    <td> lll </td>
                    <td> <a href="" class="btn btn-success text-white"> View </a>
                     <a href="" class="btn btn-primary text-white"> Edit </a> 
                    </td>
                    
                  </tr>
                  @empty
                  <h2> No Class registered at {{ config('app.name') }} </h2>
              @endforelse
                  </tbody>
                </table>
              </div> --}}
</div>

{{-- third tERM --}}
@if($thirdTerm->count() > 0)
<div class="container">
   <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="text-align:center"> <h3 style="text-align:center"> THIRD TERM </h3> </tr>
                  <tr style="text-align:center">
                    <th> Subject </th>
                    <th>Class Score (50%)</th>
                    <th>Exams Score (50%)</th>
                    <th>Total Score</th>
                    <th>Grade </th>
                    <th>Remarks </th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($thirdTerm as $report)

                  <tr style="text-align:center">
                    <td style="font-style: bold"> {{ $report->_subject }} </td>
                    <td style="font-style: bold"> {{ $report->_classScore }} </td>
                    <td style="font-style: bold"> {{ $report->_examsScore }} </td>
                    <td style="font-style: bold"> {{ $report->_totalScore }} </td>
                    <td style="font-style: bold"> {{ $report->_grade }} </td>
                     <td style="font-style: bold"> {{ $report->_remarks }} </td>
                  </tr>
                  @empty
                  
              @endforelse
                  </tbody>
                </table>
              </div>
</div>
@endif
{{-- END OF third TERM --}}


{{-- SECOND tERM --}}
@if($secondTerm->count() > 0)
<div class="container">
   <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="text-align:center"> <h3 style="text-align:center"> SECOND TERM </h3> </tr>
                  <tr style="text-align:center">
                    <th> Subject </th>
                    <th>Class Score (50%)</th>
                    <th>Exams Score (50%)</th>
                    <th>Total Score</th>
                    <th>Grade </th>
                    <th>Remarks </th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($secondTerm as $report)

                  <tr style="text-align:center">
                    <td style="font-style: bold"> {{ $report->_subject }} </td>
                    <td style="font-style: bold"> {{ $report->_classScore }} </td>
                    <td style="font-style: bold"> {{ $report->_examsScore }} </td>
                    <td style="font-style: bold"> {{ $report->_totalScore }} </td>
                    <td style="font-style: bold"> {{ $report->_grade }} </td>
                     <td style="font-style: bold"> {{ $report->_remarks }} </td>
                  </tr>
                  @empty
                 
              @endforelse
                  </tbody>
                </table>
              </div>
</div>
{{-- END OF SECOND TERM --}}
@endif

@if($firstTerm->count() > 0)
{{-- FIRST TERM --}}
<div class="container">
   <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="text-align:center"> <h3 style="text-align:center"> FIRST TERM </h3> </tr>
                  <tr style="text-align:center">
                    <th> Subject </th>
                    <th>Class Score (50%)</th>
                    <th>Exams Score (50%)</th>
                    <th>Total Score</th>
                    <th>Grade </th>
                    <th>Remarks </th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($firstTerm as $report)

                  <tr style="text-align:center">
                    <td style="font-style: bold"> {{ $report->_subject }} </td>
                    <td style="font-style: bold"> {{ $report->_classScore }} </td>
                    <td style="font-style: bold"> {{ $report->_examsScore }} </td>
                    <td style="font-style: bold"> {{ $report->_totalScore }} </td>
                    <td style="font-style: bold"> {{ $report->_grade }} </td>
                     <td style="font-style: bold"> {{ $report->_remarks }} </td>
                      @livewire('teacher.remove-subject-report', ['report'=> $report])

                  </tr>
                  @empty
                  
              @endforelse
                  </tbody>
                </table>
              </div>
</div>
{{-- SECOND TERM --}}
@endif