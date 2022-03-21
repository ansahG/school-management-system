<?php

namespace App\Http\Controllers\headTeacher;
use App\Models\headteacher\Student;
use App\Models\classes\_Class;
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
        $studentClass = _Class::where('id', $admin_student->_class_id)->get(['class']);
        // load account nformation of the student 
        return view('headTeacher.students.adminStudentView', compact(['admin_student', 'studentClass']));
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

    public function classDeck()
    {
        //this will give us a tray of classes to look at for loadin students
        $classes = _Class::where('_trashed', false)->get();
        return view('headTeacher.classes.classDeck', compact('classes'));
    }


    public function viewClass(_Class $class)
    {
        // this leads to the route where thee studets in a class are displayed for viewing
        $class->load('students');
        return view('headTeacher.classes.classStudents', compact('class'));    
    }

    public function editClass(_Class $_class)
    {
        return view('headTeacher.classes.classFormEdit', compact('_class'));
    }

    public function Class_recycle()
    {
        $recycleClasses = _Class::where('_trashed' , true)->get();
        return view('headTeacher.classes.classRecycleBin', compact('recycleClasses'));
    }
}
