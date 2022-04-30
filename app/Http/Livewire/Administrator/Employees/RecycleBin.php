<?php

namespace App\Http\Livewire\Administrator\Employees;
use App\Models\User;
use Livewire\Component;

class RecycleBin extends Component
{

      public function deletePermanently($id)
    {
        // get the student id and delete it permanently
        User::where('id' , $id)->delete();
        session()->flash('message', 'Employee deleted permanently!');
        return $this->render();
    }


    public function render()
    {
    $recycleEmployees = User::where('_trash' , true)->get();
    return view('livewire.administrator.employees.recycle-bin', compact('recycleEmployees'));
    }
}
