

    @if($class->_trashed == false)
            <div class="row">
                <div class="col-6" style="padding-right: 10px ;">
                <button class="btn btn-danger col-4 text-white" wire:click='trashClass({{ $class->id  }})'> Delete {{ $class->class }} </button>
            </div>

            <a class="btn btn-primary col-4 text-white" href="{{ route('editClass',$class->class) }}"> make changes to {{ $class->class }} </a>

            </div>

         

            <input wire:model='trash' hidden>

@else
            <div class="row">

            <div class="col-6" style="padding-right: 10px ;">
                <button class="btn btn-success col-4 text-white" wire:click='restore({{ $class->id  }})'> Restore {{ $class->class }} </button>
            </div>
               <a class="btn btn-danger col-4 text-white" wire:click='deletePermanently({{ $class->id  }})'> Delete {{ $class->class }} Permanently </a>

             {{--  <form method="POST" action="{{ route('deleteClassPermanently', $class->class) }}">
                @csrf
                @method('DELETE')
                  <button class="btn btn-danger col-4 text-white" type="submit"> Delete {{ $class->class }} Permanently </button>
              </form> --}}

            </div>

@endif

