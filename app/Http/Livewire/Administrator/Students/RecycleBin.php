<?php

namespace App\Http\Livewire\Administrator\Students;
use App\Models\Administrator\Student;
use Livewire\WithPagination;
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
        $trashedStudent = Student::where('trash' , true)->simplePaginate(20);
        return view('livewire.administrator.students.recycle-bin', compact('trashedStudent'));
    }
}
