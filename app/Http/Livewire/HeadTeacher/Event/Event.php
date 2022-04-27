<?php

namespace App\Http\Livewire\HeadTeacher\Event;
use App\Events\headTeacher\Employees\UpcomingEventNotification;
use App\Models\headteacher\events\Event as Program;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Event extends Component
{
    public $event;
    public $_eventName;
    public $_ticketPricing;
    public $_eventDate;
    public $_eventDescription;
    public $user_id;


    private function emptyValues()
    {
        $this->_eventName = null;
        $this->_eventDate = null;
        $this->_eventDescription = null;
        $this->user_id = null;
        $this->_ticketPricing= null;
    }

    public function mount($event)
    { $this->event = null;
        if($event)
        {
            $this->event = $event;
            $this->_eventName = $this->event->_eventName;
            $this->_ticketPricing = $this->event->_ticketPricing;
            $this->_eventDate = $this->event->_eventDate;
            $this->_eventDescription = $this->event->_eventDescription;
            $this->user_id = $this->event->user_id;
        }
    }


    public function addEvent()
    {
        $data = $this->validate([
            '_eventName' => ['bail' , 'required' , 'max:40', 'string'],
            '_ticketPricing' => ['bail' , 'nullable' , 'string'],
            '_eventDate' => ['bail' , 'required' , 'date'],
            '_eventDescription' => ['bail' , 'required' , 'max:150', 'string'],
            'user_id' => ['bail','nullable',],
        ]);


        if($this->event)
        {
            Program::find($this->event->id)->update($data);
            session()->flash('message', 'Event updated with success');
        }
        else
        {
                if($data['_eventDate'] >= Carbon::today())
                {
                        if(auth()->user()->_department == 'Manager')
                        {
                            Program::create($data);
                            $this->emptyValues();
                            event(new UpcomingEventNotification($data));
                        session()->flash('message', 'event Added successfully');

                        }else{
                         session()->flash('message', 'You dont have permission to create an event');
                        }
                   
                }
                else
                {
                    session()->flash('message', 'You cant add this schedule costoday or passed');
                }
        }



    }


    public function render()
    {
        // $staffs = User::where('id', '!=', auth()->user->id);
        $staffs = User::all();
        $staffs->sortBy('name');
        return view('livewire.head-teacher.event.event', compact('staffs'));
    }
}
