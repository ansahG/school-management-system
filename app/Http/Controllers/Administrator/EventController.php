<?php

namespace App\Http\Controllers\Administrator;
use App\Models\Administrator\Events\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EventController extends Controller
{
    public function createEvent()
    {
   
        return view('administrator.events.createEvent');
    }

    public function loadEvents()
    {
        // loadd all events and compact the to this view 
        // we only query for eevents that are more than today
        $events = Event::where('_eventDate', '>' , Carbon::today())->simplePaginate(10);
        // $events->sortBy('_eventDate');
        
        return view('administrator.events.loadEvents' , compact(['events']));    }

    public function editEvent(Event $event)
    {
        return view('administrator.events.editEvent', compact('event'));
    }

    public function archives()
    {
        // we are ussin the same view for the events loading, we load the sane thing just that we give a condition to whether show archives or upcomig events and that is beacuse they will display the same page layouts without eny need for diffreneces
        $events = Event::where('_eventDate', '<' , Carbon::today())->simplePaginate(10);
        return view('administrator.events.loadEvents' , compact(['events']));
    }


}
