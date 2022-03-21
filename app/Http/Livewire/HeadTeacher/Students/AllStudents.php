<?php

namespace App\Http\Livewire\HeadTeacher\Students;
use App\Models\headteacher\Student;
use Livewire\Component;

class AllStudents extends Component
{
    public function render()
    {   // loadn student without the trashed ones
        $students = Student::where('trash' , false)->get(['_firstName','_lastName','_ghanaCard']);
        return view('livewire.head-teacher.students.all-students', compact('students'));
    }
}
