
@extends('layouts.dataTableModules')

@section('content')


		  <div class="card">
              <div class="card-header">
                <h2 class="card-title text-red font-weight-bold"> @isset($list) {{ $list->count() }} student(s) found   <strong> @isset($amountEntered) with payment GHS {{ $amountEntered }} and up  @endisset </strong>  @endisset  </h2>
              </div>
        {{--  card-header --}}  
           <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name </th>
                    <th>last payed</th>
                    <th>Total payed</th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
               @forelse($list as $list)
                  
                  <tr>
                    <td>{{ $list->student->_firstName }}. {{ $list->student->_lastName }} </td>
             
                    <td>{{ $list->lastPayment }} </td>
                  
                    <td>{{ $list->amount }} </td>

                   <td>
                     <a href="{{ route('payFee', $list->student->_firstName) }}" class="btn btn-primary"> Edit  </a> </td>
                  </tr>


                    @empty
                    {{-- if any error occur in the future, remove the amount rntred var fro the epty field --}}
                  <h2> 
                    No student found! <br>
                  @isset($amountEntered) No student has paid GHS {{ $amountEntered }} and up @endisset</h2>
              @endforelse
                  </tbody>
                </table>
                 <br>

{{--                                   <span class="float-right"> {{ $list->links() }} </span class="float-right">
 --}}
{{--                  <span class="float-right"> {{ $students->links() }} </span class="float-right">
 --}}          </div>
             {{-- /card body --}}
             </div>
            {{-- /card --}}

          

           

@endsection