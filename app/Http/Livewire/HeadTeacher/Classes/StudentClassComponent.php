<?php

namespace App\Http\Livewire\HeadTeacher\Classes;
use App\Models\Classes\_Class as ClassRoom; 
use Livewire\Component;

class StudentClassComponent extends Component
{

    public $class;
    public $AKA;
    private $data;

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
                ClassRoom::create($this->data);
                $this->emptyValues();
                session()->flash('message', 'Class Registred with success!');
                return $this->render();
            }


    public function render()
    {
        $classes = ClassRoom::where('_trashed', false)->get();
        return view('livewire.head-teacher.classes.student-class-component', compact('classes'));
    }
}
