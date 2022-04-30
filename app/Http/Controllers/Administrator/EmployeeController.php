<?php

namespace App\Http\Controllers\Administrator;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     public function add_employee()
    {
        return view('administrator.employees.employeeForm');
    }

     public function viewEmployee(User $employee)
    {
        return view('administrator.employees.viewEmployee', compact('employee'));
    }

     public function allEmployees()
    {
        // load users where they are not equal to auth auser id
        // $employees = User::where()->get()
        $users = User::where('_trash', false)->get(['id','name', 'email', '_phone','id','_department']);
        $employees = $users->where('id' , '>' , 1);//this is to ensure that the main admin is not displayed in the field list for employees
        //it is neccessary because else, any other admin added my school main admin can have total control over even the school owner
        return view('administrator.employees.allEmployees', compact('employees'));
    }

    public function employeeFormEdit(User $employee)
    {
        return view('administrator.employees.employeeFormEdit', compact('employee'));
    }

    public function employee_recycle()
    {
        return view('administrator.employees.employeeRecycleBin');
    }
}
