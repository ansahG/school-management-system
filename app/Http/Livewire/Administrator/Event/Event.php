<?php

namespace App\Http\Livewire\Administrator\Event;
use App\Events\Administrator\Employees\UpcomingEventNotification;
use App\Models\Administrator\events\Event as Program;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Event extends Component
{
    public $event;
    public $_eventName;
    public $_ticketPricing;
    public $_eventDate;
    public $_time;
    public $_eventDescription;
    public $user_id;


    private function emptyValues()
    {
        $this->_eventName = null;
        $this->_eventDate = null;
        $this->_eventDescription = null;
        $this->user_id = null;
        $this->_time = null;
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
            $this->_time = $this->event->_time;
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
            '_time' => ['bail' , 'required', 'date_format:H:i'],
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
                if($data['_eventDate'] > Carbon::today())
                {
                        if(auth()->user()->_department == 'Administrator')
                        {
                            Program::create($data);
                            event(new UpcomingEventNotification($data));
                            $this->emptyValues();
                        session()->flash('message', 'event Added successfully');

                        }else{
                         session()->flash('message', 'You dont have permission to create an event');
                        }
                   
                }
                else
                {
                    session()->flash('message', 'You cant add this schedule , date is today or passed');
                }
        }



    }


    public function render()
    {
        // $staffs = User::where('id', '!=', auth()->user->id);
        $staffs = User::all();
        $staffs->sortBy('name');
        return view('livewire.administrator.event.event', compact('staffs'));
    }
}
