@extends('layouts.administrator')

@section('content')

        {{-- first column begins --}}
        <div class="col-8"> 
            <div class="card-header">
                    
            </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="Title"> Title </label>
                    <input type="text" class="form-control" value='{{ $expense->_expenseTitle }}' disabled>
                  </div>

                  <div class="card-body">
                  <div class="form-group">
                    <label for="Amount"> Amount Spending </label>
                    <input type="number" class="form-control" value='{{ $expense->_amountSpending }}' disabled>

                  </div>

                  

                  <div class="form-group">
                    <label for="Date"> Date  </label>
                    <input type="date" class="form-control"   value='{{ $expense->_date }}'  disabled>

                  </div>

                   <div class="form-group">
                    <label for="Description"> Description</label>
                    <textarea  class="form-control" disabled> {{ $expense->_description }} </textarea>
                    </div>

                </div>

                <!-- /.card-body -->
              

        </div>

              <div class="">
                    @livewire('administrator.expenses.approve-expense', ['expense' => $expense])
              </div>
        

<br>



@endsection