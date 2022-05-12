<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="container">
    <h2 class="card-title" style="text-align:center"> Select Class of student</h2>
            <div class="row">
                @forelse($classes as $class)
                    <div class="col-3" style="background-color: red !important">
                        <a href="{{ route('studentClassFee' , $class->class) }}" class="card text-center text-decoration-none"> {{ $class->class }} <br> 
                            <small> ({{ $class->AKA }}) </small>
                        </a href="">
                    </div>
                    @empty
            <h2>  Im prety sure there is nothing here </h2>
                @endforelse
            </div>
        </div>

</x-app-layout>