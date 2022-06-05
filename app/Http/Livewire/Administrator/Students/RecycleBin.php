<?php

namespace App\Http\Livewire\Administrator\Students;
use App\Models\Administrator\Student;
use Livewire\WithPagination;
use App\Models\ReportCard;
use App\Models\Accountant\SchoolFee;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class RecycleBin extends Component
{

    // public function deletePermanently($id)
    // {
    //     // get the student id and delete it permanently
    //     ReportCard::where('student_id' , $id)->delete();
    //     SchoolFee::where('student_id' , $id)->delete();
    //     $student = Student::where('id', $id)->get();
    //     $this->removeStudent($student);
    //     session()->flash('message', 'Student deleted permanently!');
    //     return $this->render();
    // }


    // public function removeStudent($student)
    // {
    //     return redirect 
    //     Storage::disk('studentAvatars')->delete('/storage/studentAvatars/'.$student->_studentAvatar);
    // }

    public function render()
    {
        $trashedStudent = Student::where('trash' , true)->simplePaginate(20);
        return view('livewire.administrator.students.recycle-bin', compact('trashedStudent'));
    }
}

// _studentAvatar