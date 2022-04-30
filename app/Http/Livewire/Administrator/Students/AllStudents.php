<?php

namespace App\Http\Livewire\Administrator\Students;
use App\Models\Administrator\Student;
use Livewire\Component;

class AllStudents extends Component
{
    public function render()
    {   // loadn student without the trashed ones
        $students = Student::where('trash' , false)->get(['_firstName','_lastName','_ghanaCard']);
        return view('livewire.administrator.students.all-students', compact('students'));
    }
}
