<?php

namespace App\Http\Livewire\Teacher;
use App\Models\Classes\_Class;
use App\Models\Administrator\Events\Event;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $classes = _Class::where('_trashed', false)->get(['class', 'AKA']);
        $events = Event::all()->sortBy('_eventDate');
        $employeeEvent = $events->where('user_id' , auth()->user()->id);
        return view('livewire.teacher.index', compact(['classes' , 'events', 'employeeEvent']));
    }
}
