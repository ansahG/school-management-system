<?php

namespace App\Http\Livewire\HeadTeacher\Event;
 use App\Models\headteacher\events\Event as Program;
use Livewire\Component;

class DeleteEvent extends Component
{

    public $event;

    public function mount($event)
    { $this->event = null;

        if($event)
        {
            $this->event = $event;
        }
    }

    public function delete($id)
    {
        Program::find($id)->delete();
        session()->flash('message' , 'Event removed with success!');
        return $this->render();
    }

    public function render()
    {
        return view('livewire.head-teacher.event.delete-event');
    }
}
