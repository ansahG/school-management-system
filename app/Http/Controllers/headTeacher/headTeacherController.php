<?php

namespace App\Http\Controllers\headTeacher;
use App\Models\headteacher\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class headTeacherController extends Controller
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
        // load account nformation of the student 
        return view('headTeacher.students.adminStudentView', compact('admin_student'));
    }

    public function recycleBin()
    {
        return view('headTeacher.students.recycleBin');
                                                                                                       
    }

    // class methods

    public function classForm()
    {
        return view('headTeacher.classes.classForm');
    }
}
