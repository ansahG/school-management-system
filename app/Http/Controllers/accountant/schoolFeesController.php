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
        return view('accountant.schoolFees.allStudents' , compact('students'));
    }

    public function payFee(Student $student)
    {
        $student->load('schoolFees');
        return view('accountant.schoolFees.payFees' , compact('student'));
    }

}
