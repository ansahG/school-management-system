
      <div class="container-fluid">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title center"> @isset($students) {{ $students->count() }} students registered @endisset </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Student Name</th>
                    <th>ID(s)</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($students as $student)

                  <tr>
                    <td style="font-style: bold">  {{ $student->_firstName }}. {{ $student->_lastName }}  </td>
                    <td> GHA-{{ $student->_ghanaCard }}</td>
                    <td> <a href="{{ route('adminStudent', $student->_firstName) }}" class="btn btn-success"> View </a>
                     <a href="{{ route('studentFormEdit', $student->_firstName) }}" class="btn btn-primary"> Edit </a> 
                    </td>
                  </tr>
                  @empty
                  <h2> No students registered at {{ config('app.name') }} </h2>
              @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
