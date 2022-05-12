
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __(auth()->user()->name) }}
        </h2>
    </x-slot>

<div class="container">
  <div class="card" style="">
	@livewire('accountant.school-fees.school-fee', ['student' => $student ])
</div>

<br>

	<div class="container" style="padding-top:30px">
	
		<div class="card" style="text-align:center">

			<div style="text-align:center"> 
			<img class="mt-5" width="100px" src="{{ asset('/storage/studentAvatars/'.$student->_studentAvatar) }}">
			</div>
			<br>

			<div class="row">  
				<div class="col-4" style="text-align:right">
					<h4> Name :</h4>
				</div>
				<div class="col-6">
					<h4> 
						{{ $student->_firstName }} {{ $student->_lastName }}.{{ $student->_lastName[0] }}
						<hr>
					</h4>
				</div>
			</div>

			<div class="row"> 
				<div class="col-4" style="text-align:right">
					<h4> Last changes :</h4>
				</div>
				<div class="col-6">
					<h4> 
						GHS {{ $student->schoolFees->lastPayment ?? 00 }}
						<hr>
					</h4>
				</div>
			</div>

			<div class="row"> 
				<div class="col-4" style="text-align:right">
					<h4> Total Amount Payed :</h4>
				</div>
				<div class="col-6">
					<h4> 
						GHS {{ $student->schoolFees->amount ?? 00 }}
						<hr>
					</h4>
				</div>
			</div>

			<div class="row"> 
				<div class="col-4" style="text-align:right">
					<h4> Sign</h4>
				</div>

				<div class="col-6">
					<h4 style="border-style: dotted;text-align:center" class="py-4">  
						{{-- this is the space where accountant will sign --}}
					</h4>
						
				</div>
			</div>

			<div class="row"> 
				<div class="col-4" style="text-align: right;">
					<h4> Last Payment Date </h4>
				</div>

				<div class="col-6">
					@isset($student->schoolFees)
						{{-- //checking if not null else we g3et error for loading if no schoolfees been payed by the student meaning its null, b=null type exception --}}
					<h4 style="border-style: dotted;" class="py-4">  
						{{ $student->schoolFees->updated_at->toDateString() ??$student->schoolFees->created_at->toDateString() }}
						{{-- time of payment --}}
						<small> {{ $student->schoolFees->updated_at->toTimeString() ??  
							$student->schoolFees->created_at->toTimeString()}} </small>
					</h4>
					@endisset	
				</div>
			</div>
			

		</div>{{-- /main card --}}

	</div>{{-- /container --}}


</div>
</x-app-layout>


