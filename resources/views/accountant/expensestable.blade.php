@extends('layouts.dataTableModules')

@section('content')





<div class="container"> 
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Expenses
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Expense form </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @livewire('accountant.expense-form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       {{--  <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
</div>




  <div class="card">
              <div class="card-header">
                <h3 class="card-title center">
{{--                  @isset($pageTitle)  @endisset </h3>
 --}}              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Title </th>
                    <th> Date </th>
               <th> Amount Involved </th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($expenses as $expense)

                  <tr>
                    <td style="font-style: bold">  {{ $expense->_expenseTitle}}  </td>
                    <td> GHs-{{ $expense->_amountSpending }}</td>
                    <td> {{ $expense->_date }}</td>


                   <td> {{-- <a href="{{ route('adminStudent', $student->_firstName) }}" class="btn btn-success"> View </a>
                     <a href="{{ route('studentFormEdit', $student->_firstName) }}" class="btn btn-primary"> Edit </a>  --}}
                    </td>
                  </tr>
                  @empty
                  <h2> Expenses here </h2>
              @endforelse
                  </tbody>
                </table>
           			<p> {{ $expenses->links() }} </p>

              </div>
              <!-- /.card-body -->
            </div>


@endsection





