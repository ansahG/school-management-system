<?php

namespace App\Http\Controllers\Administrator;
use App\Models\ReportCard;
use App\Models\Administrator\Student;
use App\Models\classes\_Class;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class studentController extends Controller
{
    public function form()
    {
        return view('administrator.students.form');
    }

    public function allStudents()
    {
        return view('administrator.students.allStudents');
    }

    public function studentFormEdit(Student $student)
    {
        return view('administrator.students.formEdit', compact('student'));
    }

    public function adminStudent(Student $admin_student)
    {
        // we use relationship to load the students report card
        // we then use the reports to load the classes based on the class id condition
        // Then we ask the query to give only the classes that is equal to the class id on the report cards of the student 
        // then we diaplay those classes on the page but why this logic
        // This logic is made to help us get only the classes that the student has had reports from, in one way  or other, we are using this logic to know the history of classes this student has been since time registered
        // if we simply load the student class, then we will only get the current class the student is registered in, the previous once will not be displayed

        // $reports = ReportCard::where('student_id', $admin_student->id)->get();
        // dd($reports);
        // $class = _Class::where('class' , $reports->__class);
        // dd($class);
        $age = Carbon::parse($admin_student->_birthDate)->age;
        return view('administrator.students.adminStudentView', compact(['admin_student' , 'age']));
        // why didnt we load all reports and simply load classes based on the report id? if we have 5000 million reports, what happen, we load all and compare? no, reducing load time with this logic
    }

    public function recycleBin()
    {
        return view('administrator.students.recycleBin');
                                                                                                       
    }

    // // report card view for student. Loading only the erport card
    // public function adminViewReportCard(_Class $class ,Student $student)
    // {
    //     // here we load this current student's report cards
    //     $tudentReport = $student->load('report');
    //     $classSortedReport = 
    //     dd($tudentReport);
    // }

}



        // $report = ReportCard::where('student_id', $admin_student->id)->get();
        // $classes = _Class::where('id', $report->__class_id)->get();
        // dd($report);
