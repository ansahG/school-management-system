<?php

namespace App\Http\Livewire\Accountant\Expenses;
use App\Models\Accountant\Expense;
use Livewire\Component;

class ExpenseForm extends Component
{
    public $expense;
    public $_expenseTitle;
    public $_amountSpending;
    public $_date;
    public $_description;

    public function emptyValues()
    {
        $this->_expenseTitle   = null;
        $this->_amountSpending = null;
        $this->_date   = null;
        $this->_description= null;
    }


    public function mount($expense)
    { $this->expense = null;

        if($expense)
        {
            $this->expense = $expense;
            $this->_expenseTitle = $this->expense->_expenseTitle;
            $this->_amountSpending = $this->expense->_amountSpending;
            $this->_date   = $this->expense->_date;
            $this->_description = $this->expense->_description; 
        }
    }

    public function addExpense()
    {
        if($this->expense)
        {
            $data = $this->validate([
                '_expenseTitle'=> ['bail', 'required','string','unique:expenses,_expenseTitle,'.$this->expense->id],
                '_amountSpending'=> ['bail', 'required','string'],
                '_date'=> ['bail', 'required','string', 'date'],
                '_description'=> ['bail', 'required','string']
                       ]);

            // add for editing if expenses exist but then
            //Must check if not approved first, we dont allow edit after approve so that accountant dont mislead record book and make chages to price after approval by the boss.
            if($this->expense->_approved == false)
            {
                auth()->user()->expense()->find($this->expense->id)->update($data);
                session()->flash('message' , 'Expense has been added!, any changes neccessary should be made cos you cant undo after approval');
                return;
            }
            else{
                //else if its approved reurn this
                session()->flash('message' , 'You cant edit expenses after approval please, delete and request agian if too neccessary');
                }
        }//end of updating logics

//creating logic starts from here
        $data = $this->validate([
            '_expenseTitle'=> ['bail', 'required','string','unique:expenses,_expenseTitle'],
            '_amountSpending'=> ['bail', 'required','string'],
            '_date'=> ['bail', 'required','string', 'date'],
            '_description'=> ['bail', 'required','string']
                        ]);
       auth()->user()->expense()->create($data);
       $this->emptyValues();
       return $this->render();
    }



    public function render()
    {
        return view('livewire.accountant.expenses.expense-form');
    }
}
