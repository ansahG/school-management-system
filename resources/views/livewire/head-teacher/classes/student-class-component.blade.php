
<div class="container-fluid">
        <form class="row"  wire:submit.prevent="saveClass">
        {{-- first column begins --}}
        <div class="col-6"> 
            <div class="card-header">
                <h3 class="card-title"> Add class  ( You can repeat class butnot the AKA / TItle) </h3>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="Class_name"> Class Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Class Name" wire:model='class' >
                    @error('class')
                      <p style="color: red"> {{ $message }} </p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="_AKA"> Class title </label>
                    <input type="text" class="form-control" id="LastName" placeholder="Class title or psecial Name" wire:model='AKA'>
                    @error('AKA')
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

<div class="container-fluid">
  <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Class </th>
                    <th>Class </th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($classes as $class)

                  <tr>
                    <td style="font-style: bold">  {{ $class->class }}  </td>
                    <td> {{ $class->AKA }}</td>
                    <td> <a href="{{ route('viewClass',$class->class) }}" class="btn btn-success text-white"> View </a>
                     <a href="{{ route('editClass', $class->class) }}" class="btn btn-primary text-white"> Edit </a> 
                    </td>
                    
                  </tr>
                  @empty
                  <h2> No Class registered at {{ config('app.name') }} </h2>
              @endforelse
                  </tbody>
                </table>
              </div>
</div>


