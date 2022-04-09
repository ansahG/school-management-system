@if($employee->_trash == false)
         {{-- Counting the trash to see if employee id dont exist in there, if the count is less than one then we show this --}}
            <div class="row">
                <div class="col-6" style="padding-right: 10px ;">
                <button class="btn btn-danger col-4" wire:click='trashEmployee({{ $employee->id  }})'> Delete {{ $employee->name }} </button>
            </div>

            <a class="btn btn-primary col-4" href="{{ route('employeeFormEdit', $employee->name) }}"> make changes to {{ $employee->name }} </a>

            </div>

         

            <input wire:model='trash' hidden>

@else
            <div class="col-6" style="padding-right: 10px ;">
                <button class="btn btn-success col-4" wire:click='restore({{ $employee->id  }})'> Restore {{ $employee->name }} </button>
            </div>
@endif