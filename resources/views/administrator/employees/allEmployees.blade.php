@extends('layouts.dataTableModules')




				
@section('content')
			

           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title center"> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Employee Name</th>
                    <th>ID(s)</th>
                    <th>Phone</th>
                <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
             @forelse($employees->where('id' , '>' , '1') as $employee)
                  <tr>
                    <td style="font-style: bold"> {{ $employee->name }} </td>
                    <td style="font-style: bold"> {{ $employee->email }} </td>
                    <td style="font-style: bold"> {{ $employee->_phone }}  </td>
                    <td style="font-style: bold"> {{ $employee->_deparment }}  </td>

                   <td> <a href="{{ route('viewEmployee', $employee->name) }}" class="btn btn-success"> View </a>
                     <a href="{{ route('employeeFormEdit', $employee->name ) }}" class="btn btn-primary"> Edit </a> 
                    </td>
                  </tr>
                  @empty
{{--                   <h4> No Teacher added </h4>
 --}}              @endforelse
                  </tbody>
                </table>
                <br>
                <span class="float-right"> {{ $employees->links() }} </span class="float-right">

              </div>
              <!-- /.card-body -->
            </div>


@endsection
				
{{-- @section('content')


@forelse($employees->where('_department', 'departen') as $employee)

{{ $employee->name }}


@empty


@endforelse



@endsection --}}