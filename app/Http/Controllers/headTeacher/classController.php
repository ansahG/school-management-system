<?php

namespace App\Http\Controllers\headTeacher;
use App\Models\classes\_Class;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class classController extends Controller
{
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
