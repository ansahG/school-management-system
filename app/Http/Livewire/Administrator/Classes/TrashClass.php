<?php

namespace App\Http\Livewire\Administrator\Classes;
use App\Models\Classes\_Class;
use App\Models\Administrator\Student;
use App\Models\Accountant\SchoolFee;
use App\Models\ReportCard;
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
            //  Student::where('__class_id', $id)->join('report_cards' , 'students.id', '=', 'report_cards.student_id')
            // ->join('school_fees' , 'students.id' , '=', 'school_fees.student_id')->delete();

           //  $student = Student::where('__class_id', $id)->get();
           //  SchoolFee::where('student_id', $student->id)->delete();
           //  ReportCard::where('student_id', $student->id)->delete();
           //  $student->delete();
           //  $class= _Class::where('id', $id)->delete();
           // session()->flash('message', 'Class restored succefully');
           //  return redirect()->route('classRecycle');
        }


    public function render()
    {
        return view('livewire.administrator.classes.trash-class');
    }
}
