<?php

namespace App\Http\Livewire\Administrator\Students;
use App\Models\Administrator\Student;

use Livewire\Component;

class RecycleBin extends Component
{

    public function deletePermanently($id)
    {
        // get the student id and delete it permanently
        Student::where('id' , $id)->delete();
        session()->flash('message', 'Student deleted permanently!');
        return $this->render();
    }

    public function render()
    {
        $trashedStudent = Student::where('trash' , true)->get(['id','_firstName', '_lastName']);
        return view('livewire.administrator.students.recycle-bin', compact('trashedStudent'));
    }
}
