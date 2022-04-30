
    <!-- Main content -->
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title center"> @isset($trashedStudent) {{ $trashedStudent->count() }} student(s) in recycle bin @endisset </h3>
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
              @forelse($trashedStudent as $trashedStudent)

                  <tr>
                    <td style="font-style: bold">  {{ $trashedStudent->_firstName }}. {{ $trashedStudent->_lastName[0] }}  </td>
                    <td> Student class here </td>
{{--                     <td> GHA-{{ $trashedStudent->_ghanaCard }}</td>
 --}}                    <td> <a href="{{ route('adminStudent', $trashedStudent->_firstName) }}" class="btn btn-success text-white"> View </a>
                     <button  wire:click='deletePermanently({{ $trashedStudent->id  }})' class="btn btn-danger text-white"> Delete Permanently  </button> 
                    </td>
                  </tr>
                  @empty
                  <h2> No students in recycle bin at {{ config('app.name') }} </h2>
              @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

        <!-- /.row -->
     