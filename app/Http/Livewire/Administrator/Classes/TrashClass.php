<?php

namespace App\Http\Livewire\Administrator\Classes;
use App\Models\Classes\_Class;
use App\Models\Administrator\Student;
use Livewire\Component;

class TrashClass extends Component
{

    public $_trashed;
    public $class;
    public function mount($class)
    {
        $class = $this->class;
    }

    public function trashClass($id)
    {
        $this->_trashed = true;
        $trash = $this->validate([
            '_trashed' => ['bail', 'boolean'],
        ]);
        _Class::where('id' , $id)->update($trash);
        session()->flash('message', 'Class trashed succefully');
        return redirect()->back();
    }

// to restore a class from the trach, we only make sure to update the culomn names trash to false 
        public function restore($id)
        {
             $this->_trashed = false;
        $trash = $this->validate([
            '_trashed' => ['bail', 'boolean'],
        ]);
        _Class::where('id' , $id)->update($trash);
        session()->flash('message', 'Class restored succefully');
        return $this->render();
        }

        public function deletePermanently($id)
        {   
            Student::where('__class_id', $id)->delete();
            _Class::where('id', $id)->delete();
            session()->flash('message', 'Class restored succefully');
            return redirect()->route('classRecycle');
        }


    public function render()
    {
        return view('livewire.administrator.classes.trash-class');
    }
}
