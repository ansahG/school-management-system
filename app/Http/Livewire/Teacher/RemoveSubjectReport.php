<?php

namespace App\Http\Livewire\Teacher;
use App\Models\ReportCard as Report;

use Livewire\Component;

class RemoveSubjectReport extends Component
{
    public $report;

    public function mount($report)
    {
        $this->$report = null;

        if($report)
        {
            $this->report = $report;
        }
    }

     public function remove($id)
    {
        Report::find($id)->delete();
        session()->flash('message', 'removed succesfully!');
        return $this->render();
    }


    public function render()
    {
        return view('livewire.teacher.remove-subject-report');
    }
}
