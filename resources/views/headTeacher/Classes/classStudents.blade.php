
@extends('layouts.dataTableModules')

@section('content')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title center"> @isset($class->students)  {{ $class->students->count() }}  student(s) in {{ $class->class }} @endisset </h3>
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
              @forelse($class->students as $student)

                  <tr>
                    <td style="font-style: bold">  {{ $student->_firstName }}. {{ $student->_lastName }}  </td>
                    <td> GHA-{{ $student->_ghanaCard }}</td>
                   {{--  <td> {{ $student->_class_id->class }}</td> --}}
                    <td> <a href="{{ route('adminStudent', $student->_firstName) }}" class="btn btn-success"> View </a>
                     <a href="{{ route('studentFormEdit', $student->_firstName) }}" class="btn btn-primary"> Edit </a> 
                    </td>
                  </tr>
                  @empty
                  <h2> No students registered in {{ $class->class }} </h2>
              @endforelse
                  </tbody>
                </table>
              </div>
            </div>
              <!-- /.card-body -->
            @isset($class)
              @livewire('head-teacher.classes.trash-class', ['class' => $class])
            @endisset
@endsection