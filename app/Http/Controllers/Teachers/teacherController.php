<?php

namespace App\Http\Controllers\Teachers;
use App\Models\Classes\_Class;
Use App\Models\Administrator\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class teacherController extends Controller
{
      
    public function __construct()
    {
        $this->middleware('teacherOnlyRoute')->except('studentReport');
    }    

    public function classAssessment(_Class $class)
    {
        // we enter this class from the route and see the studentas in there
        $class->load('students');
        return view('Teacher.classStudents', compact('class'));
    }


    public function studentReport(Student $student)
    {
        $classes = _Class::where('_trashed' , false)->get();
        return view('Teacher.reportCard', compact(['student' , 'classes']));
    }
}
