<?php

namespace App\Http\Livewire\Teacher;
use App\Models\headteacher\Student;
use App\Models\ReportCard as Report;
use App\Models\Classes\_Class as ClassRoom;
use Livewire\Component;
use Illuminate\Support\Collection;

class ReportCard extends Component
{
 public Collection $inputs;

    public $student;
    public $classes;
    
// this data here is purposely to insert into the database and not for the mounting
    public $_subject;
    public $_classScore;
    public $_examsScore;
    public $_totalScore;
    public $_grade;
    public $_remarks;
    public $__class;
    public $_term;

    public $_classTeacherRemark;



    public function emptyValues()
    {
      $this->__class = null;
      $this->_term = null;
      $this->_subject = null;
      $this->_classScore = null;
      $this->_examsScore = null;
      $this->_totalScore = null;
      $this->_grade = null;
      $this->_remarks = null;
    }

    public function mount($student , $classes)
    { 
         $this->student = null;
         $this->classes = null;

       if([$student , $classes])
       {
        $this->student = $student;
        $this->classes = $classes;
       }
    }



        public function saveData()
        {
            $data = $this->validate([
                '_subject' => ['bail','required','string'],
                '_classScore' => ['bail','required','max:50','string',],
                '_examsScore' => ['bail','required','max:50','string'],
                '_term' => ['bail','required','string'],
                '__class' => ['bail', 'required' , 'string'],
            ]);

            $data['_totalScore']= $data['_classScore']+$data['_examsScore'];
        // perform swtich case to set the remarks for the subject
            // here, we presume the total mark is 100, else and if ever the remarks are given the value for the remarks property.
            // $data['remark'] = 100;

            switch(true)
            {
                case in_array($data['_totalScore'], range(0, 39));
                $data['_remarks'] = 'Fail';
                $data['_grade'] = 'F';
                break;

                case in_array($data['_totalScore'], range(40, 49));
                $data['_remarks'] = 'Pass';
                $data['_grade'] = 'E';
                break;

                case in_array($data['_totalScore'], range(50, 59));
                $data['_remarks'] = 'Satisfactory';
                $data['_grade'] = 'D';
                break;

                case in_array($data['_totalScore'], range(60, 69));
                $data['_remarks'] = 'Good';
                $data['_grade'] = 'C';
                break;

                case in_array($data['_totalScore'], range(70, 79));
                $data['_remarks'] = 'Very Good';
                $data['_grade'] = 'B';
                break;

                case in_array($data['_totalScore'], range(80, 100));
                $data['_remarks'] = 'Excellent';
                $data['_grade'] = 'A';
                break;
            }
   
            $this->student->report()->create($data);
            $this->emptyValues();
            session()->flash('message', 'Saved succesfully!');
            return $this->render();
        }


    public function render()
    {
        // $report ->we make one queryn to the db and get reports
        // $variable term 1-> sorts  the $reports and  and gets the ones where term is one
        // &variable-> term 2 gets the term 2 from the $reports
        // same with term 3
        //  we then go to the view and display as sblade siuch
        $report_list = $this->student->report()->get()->groupBy('__class');

        // dd($report);
        // $firstTerm = $report->where( '_term' , '1');
        // $firstTerm->sortBy('__class');

        // $secondTerm = $report->where( '_term' , '2');
        // $secondTerm->sortBy('_class');

        // $thirdTerm = $report->where( '_term' , '3');
        // $thirdTerm->sortBy('__class');

        // return view('livewire.teacher.report-card' , compact(['report','firstTerm' , 'secondTerm', 'thirdTerm']));
        return view('livewire.teacher.report-card' , compact(['report_list']));
    }


    
    
}
