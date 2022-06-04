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
         // load relationship school feees from the the class module
         $list = $class->schoolFees->where('amount', '>=', $data['amountMore']);
                // catch the data entered for the view
                $amountEntered = $data['amountMore'];
        return view('accountant.schoolFees.listView' , compact(['list' , 'amountEntered',]));
    }

    public function paidList(ClassRoom $class)
    {
       
        $list = $class->schoolFees->where('amount', '>', 0);
        return view('accountant.schoolFees.listView' , compact('list'));
    }

}
