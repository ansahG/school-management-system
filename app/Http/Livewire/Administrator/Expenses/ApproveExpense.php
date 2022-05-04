<?php

namespace App\Http\Livewire\Administrator\Expenses;
use App\Models\Accountant\Expense;
use Livewire\Component;

class ApproveExpense extends Component
{
    public $expense;
    public $_approved;

     public function mount($expense)
    {
        $this->expense = null;

        if($expense)
        {
            $this->expense = $expense;
        }
    }


    public function approveExpense($id)
    {
        $this->_approved = true;

        if(auth()->user()->_department == 'Administrator')
         {
            $approve = $this->validate([
                         '_approved'=> ['bail','boolean']
                     ]);
         
                 Expense::find($id)->update($approve);
                 session()->flash('message' , 'Approval successful');
                 return;
         }

    }


    public function render()
    {
        return view('livewire.administrator.expenses.approve-expense');
    }
}
