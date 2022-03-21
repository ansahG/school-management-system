<?php

namespace App\Http\Livewire\HeadTeacher\Classes;
use App\Models\Classes\_Class as ClassRoom; 
use Livewire\Component;

class StudentClassComponent extends Component
{
    private $_trashed;

    public $_class;
    public $class;
    public $AKA;
    private $data;

    public function mount($_class)
    {  $this->_class = null;
            if($_class)
            {
             $this->_class = $_class;
             $this->class = $this->_class->class;
             $this->AKA = $this->_class->AKA;
            }
    }

    public function emptyValues()
    {
        $this->class = null;
        $this->AKA = null;
    }

    private function validator()
    {
        $this->data = $this->validate([
                'class' => ['bail', 'required', 'string'],
                'AKA' => ['bail', 'nullable', 'min:5', 'max:20','unique:__classes,AKA'],
        ]);
    }


    public function saveClass()
    {
        $this->validator();
        if($this->_class)
        {
        ClassRoom::find($this->_class->id)->update($this->data);
        $this->emptyValues();
        session()->flash('message', 'Class updated with success!');
        return redirect()->back();
        }
        else{
        ClassRoom::create($this->data);
        $this->emptyValues();
        session()->flash('message', 'Class Registered with success!');
        return $this->render();
        }
    }





    public function render()
    {
        $classes = ClassRoom::where('_trashed', false)->get();
        return view('livewire.head-teacher.classes.student-class-component', compact('classes'));
    }
}
