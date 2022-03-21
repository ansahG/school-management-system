<?php

namespace App\Http\Livewire\HeadTeacher\Students;
use App\Http\Requests\studentValidator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Axiom\Rules\TelephoneNumber;
use Axiom\Rules\DisposableEmail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\headteacher\Student;
use Illuminate\Support\Facades\Storage;
use App\Events\headTeacher\students\RegisteredEmail;
use App\Models\Classes\_Class as ClassRoom; 

// events



class StudentForm extends Component
{
    use WithFileUploads;

    public $student;
    public $__class_id;
    // student
    public $_studentAvatar; // this table will host the student url to the image
    public $_firstName;
    public $_lastName;
    public $_otherName;
    public $_birthDate;
    public $_ghanaCard;
    public $_gender;
    public $_religion;
    public $_moreInfo;
    // parent info
    public $_parentName;
    public $_parentEmail;
    public $_parentPhone;
    public $_parentGhanaCard;

    private function emptyValues()
    {
     $this->__class_id= null;
    // student
     $this->_studentAvatar = null; // this table will host the student url to the image
     $this->_firstName = null;
     $this->_lastName = null;
     $this->_otherName = null;
     $this->_birthDate = null;
     $this->_ghanaCard = null;
     $this->_gender = null;
     $this->_religion = null;
     $this->_moreInfo = null;
    // parent info
     $this->_parentName = null;
     $this->_parentEmail = null;
     $this->_parentPhone = null;
     $this->_parentGhanaCard = null;

    }

    private $data; 

    public function validator()
    {
            $this->data = $this->validate([
            '_studentAvatar' => ['bail','mimes:jpg,jpeg,png','max:2045'],
            '__class_id' => ['bail', 'required'],
            '_firstName'=>['bail','required','max:15', 'min:2','string'],
            '_lastName'=>['bail','required','max:15', 'min:2','string'],
            '_otherName'=>['bail','nullable','string'],
            '_birthDate'=>['bail','required', 'date','string'],
            '_ghanaCard'=>['bail','required','digits:11','string'],
            '_gender'=>['bail','required','string'],
            '_religion'=>['required' , 'string'],
            '_moreInfo'=>['nullable', 'string', 'max:200', 'min:10'],

            // parent validation
            '_parentName'=>['bail','required','max:30','min:10', 'string'],
            '_parentEmail'=>['bail','required', 'email','unique:students,_parentEmail',new DisposableEmail],
            '_parentPhone'=>['bail','required','unique:students,_parentPhone',new TelephoneNumber],
            '_parentGhanaCard'=>['bail','required','digits:11','string'],
        ],
        [
            '__class_id.required'=> 'please select student class',
        ]
    );
    }


    public function mount($student)
    {
        $this->student = null;
       if($student)
       {
         $this->student = $student;
         $this->__class_id = $this->student->__class_id;
        $this->_firstName = $this->student->_firstName;
        $this->_lastName  =  $this->student->_lastName;
        $this->_otherName = $this->student->_otherName;
        $this->_birthDate = $this->student->_birthDate;
        $this->_ghanaCard = $this->student->_ghanaCard;
        $this->_gender =    $this->student->_gender;
        $this->_religion =  $this->student->_religion;
        $this->_moreInfo =  $this->student->_moreInfo;
        $this->_parentName =    $this->student->_parentName;
        $this->_parentEmail =   $this->student->_parentEmail;
        $this->_parentPhone =   $this->student->_parentPhone;
        $this->_parentGhanaCard =   $this->student->_parentGhanaCard;
       }
    }

    public function addStudent()
    {
        // we are validating the student avatar away from the regular validation up there so that we can have the required method only for when the student is added for first time. Updating student does not require you to add a picture because one may be existing in the database for the said student


        // check for admin power and add this to the database
        // first make some permision database and add per admin
        // you can check for sprtie permision or make a simplee one for yourselfs
        
      
            // saves e update the sttudent after validation checks and id checks
        
        $this->validator();
        if($this->student)
            {

                if($this->_studentAvatar)
                {
                    // this formular checks if there is student avatar being added again on update, it wil validate the new incoming image, delete the old one belonging to the student and then save the new one
                    Storage::disk('studentAvatars')->delete($this->student->_studentAvatar);
                    $this->data['_studentAvatar'] = $this->_studentAvatar->store('/', 'studentAvatars');
                }

                    Student::find($this->student->id)->update($this->data);
                    session()->flash('message', 'Student updated!');
                    return $this->render();
            }
        else
            {  

                if($this->_studentAvatar)
                {
                    $this->data['_studentAvatar'] = $this->_studentAvatar->store('/', 'studentAvatars');
                    Student::create($this->data);
                    event(new RegisteredEmail($this->data));
                    $this->emptyValues();
                    session()->flash('message', 'Student saved with success!');
                }
               
            }

            // if($this->student)
            // {
            //          Student::update($this->data);
            // $this->emptyValues();
            // Alert::toast('student is updated successfully' , 'success');
            // return;
            // }
            // else{
            //         Student::create($this->data);
            // $this->emptyValues();
            // Alert::toast('student is registered successfully' , 'success');
            // return;
            // }// saving capsulation ends here
    }

    public function render()
    {
        $classes = ClassRoom::where('_trashed', false)->get();
        return view('livewire.head-teacher.students.student-form', compact('classes'));
    }
}
