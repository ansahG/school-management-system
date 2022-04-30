<?php

namespace App\Http\Livewire\Administrator;
use App\Models\Administrator\Student;
use App\Models\Classes\_Class;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $employeesCount = User::count();//come later and remove the admin Id from the list
        $studentsCount = Student::count();
        $classesCount = _Class::count();
        return view('livewire.Administrator.index', compact(['employeesCount', 'studentsCount','classesCount']));
    }
}
