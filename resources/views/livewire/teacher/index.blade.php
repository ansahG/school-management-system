
        
      <div class="container">
            <div class="row">
                @forelse($classes as $class)
                    <div class="col-3" style="background-color: red !important">
                        <a href="{{ route('classAssessment', $class->class) }}" class="card text-center text-decoration-none"> {{ $class->class }} <br> 
                            <small> ({{ $class->AKA }}) </small>
                        </a href="">
                    </div>
                    @empty
                    Im prety sure there is nothing here
                @endforelse
            </div>
        </div>
