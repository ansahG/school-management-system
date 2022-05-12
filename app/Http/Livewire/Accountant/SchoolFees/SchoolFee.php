<?php

namespace App\Http\Livewire\Accountant\SchoolFees;
use App\Events\Accountant\PayedFeeNotifier;
use Livewire\Component;

class SchoolFee extends Component
{

    public $alreadyPayedAmount;
    public $student;
    public $amount;//total amount payed by stdent in schoolFees
    public $lastPayment;

    public function emptyValues()
    {
        $this->lastPayment = null;
        $this->amount = null;
    }



    public function mount($student)
    {
        $this->student = null;
        if($student)
        {
            $this->student = $student;
            //set the already payed amount to the amount payed to student in database already that is the existing amount, else set it t zero if student has not payed anything in the past.
            $this->alreadyPayedAmount = $this->student->schoolFees->amount ?? 0;
        }
    }


        public function payFee()
        {
               //add the curent amount to the existing amount payed by the student and set the key value of the amount variable to result and set to the new value
                $data = $this->validate([
                    'lastPayment' => ['required','max:1000000'],
                ]);
                $data['amount'] = $data['lastPayment'] + $this->alreadyPayedAmount;
                
          if($this->student->schoolFees == !null)
           {
            //if not null we update with the mathematical alg we made by adding the current amount to the already existing ones in database
            //we have allowed negative values so that amount added mistakenly can be revised by subtracting from the existing one with neg
                $this->student->schoolFees()->update($data);
                //add neccessary data for the Email notification 
                $data['guardianMail'] = $this->student->_parentEmail;
                $data['studentname'] = $this->student->_firstName;
                $data['availableBalance'] = $this->alreadyPayedAmount;
                event(new PayedFeeNotifier($data));
                $this->emptyValues();
                session()->flash('message' , 'School fees payed with success!');
           }
           else
           {
              //else if null, create a new one
               $this->student->schoolFees()->create($data);

//add neccessary data for the email notification
               $data['guardianMail'] = $this->student->_parentEmail;
                $data['studentname'] = $this->student->_firstName;
                $data['availableBalance'] = $this->alreadyPayedAmount;
                event(new PayedFeeNotifier($data));

                $this->emptyValues();
                session()->flash('message' , 'School fees payed with success!');
           }
        }




    public function render()
    {
        return view('livewire.accountant.school-fees.school-fee');
    }
}
