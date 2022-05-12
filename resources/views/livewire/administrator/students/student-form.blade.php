

<div class="container">
        <form class="row"  wire:submit.prevent="addStudent">


        <div class="container" style="vertical-align: flex; text-align: center;">
        @if($_studentAvatar)
        <label for="student_picture_path">
        <div class="card" style="max-width: 8rem;">
            <img src="{{ $_studentAvatar->temporaryUrl() }}" class="card-img-top" alt="selected image">
            <div wire:loading wire:target='_studentAvatar'>
              
            </div>
        </div>
         </label>
            @else
         <label for="student_picture_path">
        <div class="card" style="max-width: 8rem;max-height: 5rem !important;" style="text-align:center;">
            <img src="https://www.freeiconspng.com/thumbs/add-icon-png/add-new-plus-user-icon--icon-search-engine-32.png" class="card-img-top" alt="Add image">
        </div>
         </label>
        @endif

                <input type="file" wire:model='_studentAvatar' id="student_picture_path" hidden="">
                 @error('_studentAvatar')
                      <p style="color: red"> {{ $message }} </p>
                @enderror
          </div>
 
        {{-- first column begins --}}
        <div class="col-6"> 
               <div class="card-header">
                <h3 class="card-title"> Student Information </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="First_Name">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" wire:model='_firstName' >
                    @error('_firstName')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="last_Name">Last Name</label>
                    <input type="text" class="form-control" id="LastName" placeholder="Last Name" wire:model='_lastName'>
                    @error('_lastName')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="Other_names">Other Names </label>
                    <input type="text" class="form-control" id="otherName" placeholder="Last Name" wire:model='_otherName'>
                    @error('_otherName')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="BirthDate">Birth Date</label>
                    <input type="date" class="form-control" id="birthdate" placeholder="Last Name" wire:model='_birthDate'>
                    @error('_birthDate')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="Ghana_card">GH card Number</label>
                    <input type="number" class="form-control" id="GhanaCard" placeholder="Without the GHA" wire:model='_ghanaCard'>
                    @error('_ghanaCard')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="other_info">Other Info</label>
                    <textarea  class="form-control" placeholder="This could be anything including health issues" wire:model='_moreInfo'> </textarea>
                    @error('_moreInfo')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="row">
                    {{-- gender select --}}
                    <select class="col-2" wire:model="_gender">
                      <option > Gender</option>
                      <option value="Male"> Male </option>
                      <option value="Female"> Female </option>
                    </select>
                     @error('_gender')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror

                    {{-- religion select begins here --}}
                    <select class="col-2" wire:model="_religion">
                      <option > Religion</option>
                      <option value="ATR"> ATR </option>
                      <option value="Islam"> Islam </option>
                      <option value="Christian"> Christian </option>
                      <option value="Atheist"> Atheist </option>
                    </select>
                    @error('_religion')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror


                       <select class="col-2" wire:model="__class_id">
                      <option> class</option>
                      @forelse($classes as $class)
                      <option value="{{ $class->id }}"> {{ $class->class }} </option>
                      @empty

                      @endforelse
                   
                    </select>
                    @error('__class_id')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>


                      {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> --}}


                 {{--  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> --}}
                
                </div>
                <!-- /.card-body -->

              
        </div> {{-- first culumn ends here for students--}}

        {{-- second culomn begindns here --}}
        <div class="col-6">
            <div class="card-header">
                <h3 class="card-title"> Parent Information </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">

                  <div class="form-group">
                    <label for="Parent_Name">Parent Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" wire:model='_parentName' >
                    @error('_parentName')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="Parent_Email">Email</label>
                    <input type="email" class="form-control" placeholder="@example.com" wire:model='_parentEmail' >
                    @error('_parentEmail')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="Parent_Email">Phone</label>
                    <input type="tel" class="form-control" placeholder="" wire:model='_parentPhone' >
                    @error('_parentPhone')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="Parent_Ghana_card">Ghana Card</label>
                    <input type="number" class="form-control" placeholder="Without the GHS" wire:model='_parentGhanaCard' >
                    @error('_parentGhanaCard')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                 {{--  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" wire:model="_parentEmail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> --}}
                  {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> --}}
                </div>
        </div> {{-- second culomn ends here --}}


    </form>
</div>          
