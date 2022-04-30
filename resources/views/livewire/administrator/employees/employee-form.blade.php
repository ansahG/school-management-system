<div class="container card">
  
{{-- @if(session()->has('message'))
    <div style="color:red">
        <p> {{ session()->get('message') }} </p>
    </div>
 @endif   --}}   

<form class="form"  wire:submit.prevent="employData">
    <div class="row">
          <div class="col-5"> 
            <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" placeholder="Enter" wire:model='name' >
                    @error('name')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

          <div class="col-5"> 
            <div class="form-group">
                    <label for="Email">Email </label>
                    <input type="email" class="form-control" id="Email" placeholder="Enter" wire:model='email' >
                    @error('email')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

          <div class="col-5"> 
            <div class="form-group">
                    <label for="Email">Ghana Card </label>
                    <input type="number" class="form-control" id="ghanaacard" placeholder="Enter" wire:model='_ghanaCard' >
                    @error('_ghanaCard')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

           <div class="col-5"> 
            <div class="form-group">
                    <label for="date_starting"> Date Starting </label>
                    <input type="date" class="form-control" id="date_starting" placeholder="Enter" wire:model='_dateStarting' >
                    @error('_dateStarting')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

          <div class="col-5"> 
            <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="_phone" placeholder="Enter" wire:model='_phone' >
                    @error('_phone')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

          <div class="col-5"> 
            <div class="form-group">
                    <label for="snitt">Birthdate</label>
                    <input type="date" class="form-control" id="Birthdate" placeholder="Enter" wire:model='_dateOfBirth' >
                    @error('_dateOfBirth')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

           <div class="col-5"> 
            <div class="form-group">
                    <label for="snitt">Salary</label>
                    <input type="number" class="form-control" id="Salary" placeholder="Enter" wire:model='_salary' >
                    @error('_salary')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
              </div>
          </div>

          <div class="col-5">
             <select wire:model="_department">
                      <option > Deparment</option>
                      <option value="Administrator"> Administrator </option>
                      <option value="Accountant"> Accountant </option>
                      <option value="Teacher"> Teacher </option>
                      <option value="Chef"> Chef </option>
                      <option value="Cleaner"> Cleaner </option>
                      <option value="Driver"> driver </option>
                    </select>
                     @error('_department')
                      <p style="color: red"> {{ $message }} </p>
          @enderror
          </div>

    </div>
    <button class="btn btn-primary"> Proceed </button>
</form>      





</div>