<?php

namespace App\Http\Livewire\Administrator\Students;
use App\Http\Controllers\Administrator\AdministratorController;
use App\Models\Administrator\Student;
use Livewire\Component;

class TrashStudent extends Component
{
    public $student; 
    public $trash;

    public function mount($student)
    {
        $student = $this->student;
    }


        public function trashStudent($id)
        {
            $this->trash = true;
            $trash = $this->validate([
                'trash'=> ['bail','boolean']
            ]);
           Student::find($id)->update($trash);

           session()->flash('message' , 'Student has been trashed with success!');
           return $this->render();
        }




        public function restore($id)
        {
             $this->trash = false;
            $trash = $this->validate([
                'trash'=> ['bail','boolean']
            ]);
           Student::find($id)->update($trash);
           session()->flash('message' , 'Student has been restored with success!');
           return  $this->render();
        }



    public function render()
    {
        return view('livewire.administrator.students.trash-student');
    }
}
