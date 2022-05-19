
              <div class="card">
              <div class="card-header">
                <h3 class="card-title"> @isset($trashedStudent) {{ $trashedStudent->count() }} student(s) in recycle bin @endisset </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name </th>
                    <th>ID</th>
                    <th>Action(s)</th>
                  </tr>
                  </thead>
                  <tbody>
               @forelse($trashedStudent as $student)
                  
                  <tr>
                    <td>{{ $student->_firstName }}. {{ $student->_lastName }} </td>
                    <td> GHA-{{ $student->_ghanaCard }} </td>
                    <td>
                      <a href="{{ route('adminStudent', $student->_firstName) }}" class="btn btn-success text-white"> View </a>
                     <button  wire:click='deletePermanently({{ $student->id  }})' class="btn btn-danger text-white"> Delete Permanently  </button> 
                    </td>
                  </tr>

                    @empty
                  <h2> No students in recycle bin </h2>
              @endforelse
                  </tbody>
                </table>
             <span class="float-right"> {{ $trashedStudent->links() }} </span class="float-right">
          </div>
              <!-- /.card-body -->
             </div>
            <!-- /.card -->

