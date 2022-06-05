
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



      <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Student Name</th>
                    <th>ID(s)</th>
{{--                     <th>Class</th>
 --}}                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              @forelse($class->students->where('trash' , false) as $student)

                  <tr>
                    <td style="font-style: bold">  {{ $student->_firstName }} {{ $student->_lastName }}  </td>
                    <td> GHA-{{ $student->_ghanaCard }}</td>
                  {{--<td> {{ $student->__class_id->class }}</td>--}} 
                   <td> <a href="{{ route('studentReport', $student->_firstName) }}" class="btn btn-success"> View </a>
                    </td>
                  </tr>
                  @empty
                  <h2> No active student in this class </h2>
              @endforelse
                  </tbody>
                </table>
              </div>






</x-app-layout>