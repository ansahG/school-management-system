@extends('layouts.dataTableModules')

@section('content')

  <div class="card">
              <div class="card-header">
                <h3 class="card-title center">
                 @isset($expenses) {{ $expenses->count() }} @endisset </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Title </th>
                    <th> Amount Involved </th>
                    <th>  Date</th>
                    <th>  Actions</th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($expenses as $expense)

                  <tr>
                    <td style="font-style: bold">  {{ $expense->_expenseTitle}}  </td>
                    <td> GHs-{{ $expense->_amountSpending }}</td>
                    <td> {{ $expense->_date }}</td>


                   <td> <a href="{{ route('expenseView', $expense->_expenseTitle) }}" class="btn btn-success"> View / Edit </a>

                    @if($expense->_approved == false)
                    	{{-- approve --}}
                    @livewire('administrator.expenses.approve-expense', ['expense' => $expense] )
                    @endif
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





