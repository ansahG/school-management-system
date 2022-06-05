            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> @isset($students) {{ $students->count() }} student(s)@endisset  </h3>
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
               @forelse($students as $student)
                  
                  <tr>
                    <td>{{ $student->_firstName }} {{ $student->_lastName }} </td>
                    <td> GHA-{{ $student->_ghanaCard }} </td>
                    <td><a href="{{ route('adminStudent', $student->_firstName) }}" class="btn btn-success"> View </a>
                     <a href="{{ route('studentFormEdit', $student->_firstName) }}" class="btn btn-primary"> Edit </a> </td>
                  </tr>

                    @empty
                  <h2> No students registered at {{ config('app.name') }} </h2>
              @endforelse
                  </tbody>
                </table>
                 <br>
                 <span class="float-right"> {{ $students->links() }} </span class="float-right">
          </div>
              <!-- /.card-body -->
             </div>
            <!-- /.card -->

