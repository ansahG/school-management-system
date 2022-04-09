<?php

namespace App\Http\Controllers\headTeacher;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     public function add_employee()
    {
        return view('headTeacher.employees.employeeForm');
    }

     public function viewEmployee(User $employee)
    {
        return view('headTeacher.employees.viewEmployee', compact('employee'));
    }

     public function allEmployees()
    {
        // load users where they are not equal to auth auser id
        // $employees = User::where()->get()
        $employees = User::where('_trash', false)->get(['name', 'email', '_phone','id','_department']);
        return view('headTeacher.employees.allEmployees', compact('employees'));
    }

    public function employeeFormEdit(User $employee)
    {
        return view('headTeacher.employees.employeeFormEdit', compact('employee'));
    }

    public function employee_recycle()
    {
        return view('headTeacher.employees.employeeRecycleBin');
    }
}
