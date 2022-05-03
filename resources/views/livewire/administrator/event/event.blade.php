
<div class="container-fluid">
        <form class="row"  wire:submit.prevent="addEvent">
        {{-- first column begins --}}
        <div class="col-6"> 
            <div class="card-header">
                    Add an Event
            </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="Event_name"> Event Name </label>
                    <input type="text" class="form-control" wire:model='_eventName' >
                    @error('_eventName')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="card-body">
                  <div class="form-group">
                    <label for="Pricing"> Pricing (Tickets) </label>
                    <input type="number" class="form-control" wire:model='_ticketPricing'>
                    @error('_ticketPricing')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  

                  <div class="form-group">
                    <label for="_eventDate"> Date  </label>
                    <input type="date" class="form-control"   wire:model='_eventDate' min="<?php date('y-m-d') ?>">
                    @error('_eventDate')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="_time"> Time  </label>
                    <input type="time" class="form-control"   wire:model='_time'>
                    @error('_time')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="other_info">Event Description</label>
                    <textarea  class="form-control" wire:model='_eventDescription'> </textarea>
                    @error('_eventDescription')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                </div>


                    <div>
                     <select class="form-control" wire:model="user_id">
                      <option > Staff in charge </option>
                      @foreach($staffs as $staff)
                      <option value="{{ $staff->id }}"> {{ $staff->name }} </option>
                      @endforeach
                    </select>
                    @error('user_id')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                </div>

                </div>

                <!-- /.card-body -->
              

        </div>

              <div class="">
                  <button type="submit" class="btn btn-primary text-white">Submit</button>
              </div>

    </form>
</div>          

<br>



