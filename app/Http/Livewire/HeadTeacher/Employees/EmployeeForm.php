<?php

namespace App\Http\Livewire\Headteacher\Employees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use Livewire\Component;

class EmployeeForm extends Component
{
    public $employee;
    public $name;
    public $email;
    public $password; //we set the user phone card to password
    public $_dateStarting;
    public $_ghanaCard;
    public $_phone;
    public $_dateOfBirth;
    public $_department;
    public $_salary;


    public function emptyValues()
    {
        // this will be used to set the data values entered in a form to empty after saving
        $this->name = null;
        $this->email = null;
        $this->password = null; //we set the user phone card to password
        $this->_dateStarting = null;
        $this->_ghanaCard = null;
        $this->_phone = null;
        $this->_dateOfBirth = null;
        $this->_department = null;
        $this->_salary = null;
    }


    public function mount($employee)
    { $this->employee = null;

        if($employee)
        { $this->employee = $employee;
                $this->name = $this->employee->name;
                $this->email = $this->employee->email;
                $this->_dateStarting = $this->employee->_dateStarting;
                $this->_ghanaCard = $this->employee->_ghanaCard;
                $this->_phone = $this->employee->_phone;
                $this->_dateOfBirth = $this->employee->_dateOfBirth;
                $this->_department = $this->employee->_department;
                $this->_salary = $this->employee->_salary;
        }
    }




    public function employData()
    {

        if($this->employee)
        {
                $data = $this->validate([
                    'name' => ['bail','required', 'string', 'max:140'],
                    'email' => ['bail', 'required', 'email', 'max:120', Rule::unique('users')->ignore($this->employee)],
                    '_ghanaCard' => ['bail','required', Rule::unique('users')->ignore($this->employee)],
                    '_dateStarting' => ['bail','required', 'date'],
                    '_phone' => ['bail','required', 'digits:10', Rule::unique('users')->ignore($this->employee)],
                    '_dateOfBirth' => ['bail',' required', 'date'],
                    '_department' => ['bail', 'required','string'],
                    '_salary' => [ 'bail' , 'required'],
                ]);
         $data['password'] = Hash::make($data['_phone']);
            User::find($this->employee->id)->update($data);
            session()->flash('message', 'Employee updated');
        }
        else
        {

                    $data = $this->validate([
                         'name' => ['bail','required', 'string', 'max:140'],
                    'email' => ['bail', 'required', 'email', 'max:120','unique:users,email'],
                    '_ghanaCard' => ['bail','required', 'unique:users,_ghanaCard'],
                    '_dateStarting' => ['bail','required', 'date'],
                    '_phone' => ['bail','required', 'digits:10', 'unique:users,_phone'],
                    '_dateOfBirth' => ['bail',' required', 'date'],
                    '_department' => ['bail', 'required','string'],
                    '_salary' => [ 'bail' , 'required'],
                    ]);
                    $data['password'] = Hash::make($data['_phone']);

            User::create($data);
            $this->emptyValues();
            session()->flash('message', 'Employee added');
        }
        
        //  $data['password'] = Hash(256, $data['_phone']);
        // dd([$data]);
    }


    public function render()
    {
        return view('livewire.head-teacher.employees.employee-form');
    }
}
