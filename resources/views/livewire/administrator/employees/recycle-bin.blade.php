

            <div class="card">
              <div class="card-header">
                <h3 class="card-title center"> @isset($recycleEmployees) {{ $recycleEmployees->count() }} student(s) in recycle bin @endisset </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Student Name</th>
                    <th>Class </th>
{{--                     <th>ID(s)</th>
 --}}                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($recycleEmployees as $recycleEmployee)

                  <tr>
                    <td style="font-style: bold">  {{ $recycleEmployee->name }}. {{ $recycleEmployee->email }}  </td>
                    <td> Student class here </td>
{{--                     <td> GHA-{{ $trashedStudent->_ghanaCard }}</td>
 --}}                    <td> <a href="{{ route('viewEmployee', $recycleEmployee->name) }}" class="btn btn-success text-white"> View </a>
                     <button  wire:click='deletePermanently({{ $recycleEmployee->id  }})' class="btn btn-danger text-white"> Delete Permanently  </button> 
                    </td>
                  </tr>
                  @empty
                  <h2> No Employees in recycle bin at {{ config('app.name') }} </h2>
              @endforelse
                  </tbody>
               </table>
                <br>
                <span class="float-right"> {{ $recycleEmployees->links() }} </span class="float-right">


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         