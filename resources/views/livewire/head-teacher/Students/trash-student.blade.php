

    @if($student->trash == false)
         {{-- Counting the trash to see if student id dont exist in there, if the count is less than one then we show this --}}
            <div class="row">
                <div class="col-6" style="padding-right: 10px ;">
                <button class="btn btn-danger col-4" wire:click='trashStudent({{ $student->id  }})'> Delete {{ $student->_firstName }} </button>
            </div>

            <a class="btn btn-primary col-4" href="{{ route('studentFormEdit', $student->_firstName) }}"> make changes to {{ $student->_firstName }} </a>

            </div>

         

            <input wire:model='trash' hidden>

@else
            <div class="col-6" style="padding-right: 10px ;">
                <button class="btn btn-success col-4" wire:click='restore({{ $student->id  }})'> Restore {{ $student->_firstName }} </button>
            </div>
@endif