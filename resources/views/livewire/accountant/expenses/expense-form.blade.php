

        <form class="row"  wire:submit.prevent="addExpense">
        {{-- first column begins --}}
        <div class="col-12"> 
            <div class="card-header">
                    Add Expenses
            </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="Title"> Title </label>
                    <input type="text" class="form-control" wire:model='_expenseTitle' >
                    @error('_expenseTitle')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="card-body">
                  <div class="form-group">
                    <label for="Amount"> Amount Spending </label>
                    <input type="number" class="form-control" wire:model='_amountSpending'>
                    @error('_amountSpending')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  

                  <div class="form-group">
                    <label for="Date"> Date  </label>
                    <input type="date" class="form-control"   wire:model='_date' min="<?php date('y-m-d') ?>">
                    @error('_date')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="Description"> Description</label>
                    <textarea  class="form-control" wire:model='_description'> </textarea>
                    @error('_description')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                    </div>

                </div>

                <!-- /.card-body -->
              

        </div>

              <div class="inline-block" style="text-align: center">
                  <button type="submit" class="btn btn-primary text-white">Submit</button>
              </div>

    </form>
        

<br>



