@if(auth()->user()->_department == 'Teacher')

    {{-- only show this for to teachers --}}

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
              <div class="" style="text-align: center">
                  <button type="submit" class="btn btn-primary text-white">Submit</button>
              </div>
            @endif

    </form>
</div>          

@endif








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


{{-- the grand grouping opening starts from here  --}}



@forelse($report_list as $class => $report)

{{-- main container starts here --}}
<div class="container">
   <div class="card-body">
    <h2 style="text-align: center; text-decoration: underline" > {{ $class }} </h2>
    {{-- first term report card starts here --}}
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

              @forelse($report->where('_term' , '1') as $firstTerm)
              
                  <tr style="text-align:center">
                    <td style="font-style: bold"> {{ $firstTerm->_subject }} </td>
                    <td style="font-style: bold"> {{ $firstTerm->_classScore }} </td>
                    <td style="font-style: bold"> {{ $firstTerm->_examsScore }} </td>
                    <td style="font-style: bold"> {{ $firstTerm->_totalScore }} </td>
                    <td style="font-style: bold"> {{ $firstTerm->_grade }} </td>
                     <td style="font-style: bold"> {{ $firstTerm->_remarks }} </td>
                  </tr>

                    @empty
                    {{-- return nothing if its empty --}}
                  @endforelse
                  </tbody>
                </table>
    {{-- first term report card ends here here --}}






<br style="line-height:150px"> 







    {{-- second term report card start from here --}}
          <div style="background-color:#ADD8E6" class="card container text-white">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="text-align:center"> <h3 style="text-align:center; color:rgb(70,33,27)"> SECOND TERM </h3> </tr>
                  <tr style="text-align:center ;color:rgb(70,33,27)" >
                    <th> Subject </th>
                    <th>Class Score (50%)</th>
                    <th>Exams Score (50%)</th>
                    <th>Total Score</th>
                    <th>Grade </th>
                    <th>Remarks </th>
                  </tr>
                  </thead>
                  <tbody>

              @forelse($report->where('_term' , '2') as $secondTerm)
              
                  <tr style="text-align:center; color:rgb(70,33,27)">
                    <td style="font-weight: bold"> {{ $secondTerm->_subject }} </td>
                    <td style="font-style: bold"> {{ $secondTerm->_classScore }} </td>
                    <td style="font-style: bold"> {{ $secondTerm->_examsScore }} </td>
                    <td style="font-style: bold"> {{ $secondTerm->_totalScore }} </td>
                    <td style="font-style: bold"> {{ $secondTerm->_grade }} </td>
                     <td style="font-style: bold"> {{ $secondTerm->_remarks }} </td>
                  </tr>

                    @empty
                    {{-- return nothing if its empty --}}
                  @endforelse
                  </tbody>
                </table>
         </div>
    {{-- second term report card ends here --}}




<br style="line-height:150px"> 



    {{-- Third term report card start from here --}}
          <div class="card container">
                <table id="example1" class="table table-bordered table-striped" style="padding: 5rem;">
                  <thead>
                    <tr style="text-align:center"> <h3 style="text-align:center">THIRD TERM </h3> </tr>
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

              @forelse($report->where('_term' , '3') as $thirdTerm)
              
                  <tr style="text-align:center">
                    <td style="font-weight: bold"> {{ $thirdTerm->_subject }} </td>
                    <td style="font-style: bold"> {{ $thirdTerm->_classScore }} </td>
                    <td style="font-style: bold"> {{ $thirdTerm->_examsScore }} </td>
                    <td style="font-style: bold"> {{ $thirdTerm->_totalScore }} </td>
                    <td style="font-style: bold"> {{ $thirdTerm->_grade }} </td>
                     <td style="font-style: bold"> {{ $thirdTerm->_remarks }} </td>
                  </tr>

                    @empty
                    {{-- return nothing if its empty --}}
                  @endforelse
                  </tbody>
                </table>
          </div>
    {{-- third term report card ends here --}}




              </div>
</div>{{-- main container ends here --}}





  




@empty
  <h3 style="text-align:center; color:red"> {{-- show nothing --}} </h3>
@endforelse
{{-- the grand and foremost grouping by claass forelse ends here --}}