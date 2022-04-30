<?php

namespace App\Http\Livewire\Administrator\Employees;
use App\Models\User;
use Livewire\Component;

class TrashEmployee extends Component
{

     public $employee; 
    public $_trash;

    public function mount($employee)
    {
        $employee = $this->employee;
    }


     public function trashEmployee($id)
        {
            $this->_trash = true;
            $trash = $this->validate([
                '_trash'=> ['bail','boolean']
            ]);
           User::where('id', $id)->update($trash);

           session()->flash('message' , 'Employee has been trashed with success!');
           return $this->render();
        }




        public function restore($id)
        {
            // we give the rash metod a value of false then update the database with it so that we get the tras of the employee to be flase
             $this->_trash = false;
            $trash = $this->validate([
                '_trash'=> ['bail','boolean']
            ]);
           User::where('id', $id)->update($trash);
           session()->flash('message' , 'Employee has been restored with success!');
           return  $this->render();
        }



    public function render()
    {
        return view('livewire.administrator.employees.trash-employee');
    }
}
