<?php

namespace App\Http\Controllers\Teachers;
use App\Models\Classes\_Class;
Use App\Models\headteacher\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    public function classAssessment(_Class $class)
    {
        // we enter this class from the route and see the studentas in there
        $class->load('students');
        return view('Teacher.classStudents', compact('class'));
    }


    public function studentReport(Student $student)
    {
        $classes = _Class::get();
        return view('Teacher.reportCard', compact(['student' , 'classes']));
    }
}
