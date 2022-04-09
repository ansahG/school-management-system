<?php

namespace App\Http\Controllers\headTeacher;
use App\Models\headteacher\Student;
use App\Models\classes\_Class;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function form()
    {
        return view('headTeacher.students.form');
    }

    public function allStudents()
    {
        return view('headTeacher.students.allStudents');
    }

    public function studentFormEdit(Student $student)
    {
        return view('headTeacher.students.formEdit', compact('student'));
    }

    public function adminStudent(Student $admin_student)
    {
        // load student class
        $studentClass = _Class::where('id', $admin_student->_class_id)->get(['class']);
        // load account nformation of the student 
        return view('headTeacher.students.adminStudentView', compact(['admin_student', 'studentClass']));
    }

    public function recycleBin()
    {
        return view('headTeacher.students.recycleBin');
                                                                                                       
    }
}
