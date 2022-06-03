<?php

namespace App\Http\Controllers\accountant;
use App\Models\Classes\_Class as ClassRoom; 
use App\Models\Administrator\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class schoolFeesController extends Controller
{
    public function selectClass()
    {
        $classes = ClassRoom::where('_trashed',  false)->get();
        return view('accountant.schoolFees.allClasses', compact('classes'));
    }

    public function enterClass(ClassRoom $class)
    {
        // enter the class room and load all students in the class for the fees
        $students = $class->students()->where('trash' , false)->simplePaginate(15);
        return view('accountant.schoolFees.allStudents' , compact(['students', 'class']));
    }

    public function payFee(Student $student)
    {
        $student->load('schoolFees');
        return view('accountant.schoolFees.payFees' , compact('student'));
    }

    public function displayDeptors(ClassRoom $class)
    {
        $data = request()->validate([
            'amountMore' => ['bail','required','numeric'],
        ]);

        // get students in this class
         $students = $class->students;

        foreach($students as $student)
        {
            //query those who have more than the mentioned amount
           $list = $student->schoolFees()->where('amount' , '>' , $data)->simplePaginate(15);
       
            //pass the data to the controller if any exist
            if($list->count() >= 1)
            {
                $amountEntered = $data['amountMore'];
                return view('accountant.schoolFees.listView' , compact(['list' , 'amountEntered',]));
            }
            else{
                    session()->flash('message' , 'No one exist with an amount more than this');
                }
            
        }
    }

    public function paidList(ClassRoom $class)
    {
       
         $students = $class->students;

          foreach($students as $student)
        {
            $list = $student->schoolFees()->where('amount' , '>' , 0)->simplePaginate(15);
             return view('accountant.schoolFees.listView' , compact('list'));
        }
    }

}
