

        <form class="row"  wire:submit.prevent="payFee" style="text-align: center;">
       <div style="text-align:center">
          {{-- first column begins --}}
        <div class="col-sm--12 col-md-6"> 
            <div class="card-header">
                    Paying Fees: <h4> {{ $student->_firstName }} </h4>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="Event_name"> Amount Paying </label>
                    <input type="number" class="form-control" wire:model='lastPayment' >
                    @error('lastPayment')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>
                </div>
        </div>

                <!-- /.card-body -->
              

        </div>

              <div class="" style="text-align:center">
                  <button type="submit" class="btn btn-primary text-white">Submit</button>
              </div>

       </div>
    </form>
      

<br>



