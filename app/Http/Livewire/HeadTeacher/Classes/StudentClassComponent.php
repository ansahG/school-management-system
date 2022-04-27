<?php

namespace App\Http\Livewire\HeadTeacher\Classes;
use App\Models\Classes\_Class as ClassRoom; 
use Livewire\Component;
use illluminate\Facades\Rules;
class StudentClassComponent extends Component
{
    private $_trashed;
    // for the mounted class id
    public $_class;

    // for the incoming field data
    public $class;
    public $AKA;
    // private $data;

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

    // private function validator()
    // {
    //     $this->data = $this->validate([
    //             'class' => ['bail', 'required', 'string'],
    //             'AKA' => ['bail', 'nullable', 'min:5', 'max:20', 'unique:__classes,AKA,'],

    //         ]);
    // }


    public function saveClass()
    {
        // $this->validator();
        if($this->_class)
        {
            $data = $this->validate([
                'class' => ['bail', 'required', 'string'],
                'AKA' => ['bail', 'nullable', 'min:5', 'max:20', 'unique:__classes,AKA,'.$this->_class->id],

            ]);

        ClassRoom::find($this->_class->id)->update($data);
        session()->flash('message', 'Class updated with success!');
        return redirect()->route('classCreate');
        }

        else{

            $data = $this->validate([
                'class' => ['bail', 'required', 'string'],
                'AKA' => ['bail', 'nullable', 'min:5', 'max:20', 'unique:__classes,AKA'],
        ],
        [
            'AKA.unique' => 'class title already exist',
        ]);

        ClassRoom::create($data);
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


// $request->validate([
//     'email' => 'required|unique:user,email,'.$userID.'|max:20',
// ]);