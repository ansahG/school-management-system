

@extends('layouts.dataTableModules')

@section('content')


<div>
    <form class="row" action="{{ route('displayDeptors', $class->class) }}" method="Post" style="text-align: center;">
      @csrf
      <div class="font-weight-bold">
      Students who have above: <input type="number" class="text-red text-center" name="amountMore">  <button type="submit" class="btn btn-danger"> Find </button>
      </div>
      @error('amountLess')
        <div>
            <p class="text-red"> {{ $message }} </p>
        </div>
      @enderror
     </form>

      <br>
 </div>

        <a href="{{ route('paidList', $class->class) }}" class="btn btn-primary"> Paid list  </a> </td>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> @isset($students) {{ $students->count() }} student(s)@endisset  </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name </th>
                    <th>ID</th>
                    <th>Action(s)</th>
                  </tr>
                  </thead>
                  <tbody>
               @forelse($students as $student)
                  
                  <tr>
                    <td>{{ $student->_firstName }}. {{ $student->_lastName }} </td>
                    <td> GHA-{{ $student->_ghanaCard }} </td>

                    <td>
                     <a href="{{ route('payFee', $student->_firstName) }}" class="btn btn-primary"> Pay  </a> </td>
                  </tr>

                    @empty
                  <h2> No students registered in this class </h2>
              @endforelse
                  </tbody>
                </table>
                 <br>
                 <span class="float-right"> {{ $students->links() }} </span class="float-right">
          </div>
              <!-- /.card-body -->
             </div>
            <!-- /.card -->










@endsection