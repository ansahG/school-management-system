<?php

namespace App\Http\Livewire\Accountant\Expenses;
use App\Models\Accountant\Expense;
use Livewire\Component;

class DeleteExpense extends Component
{

    public $expense;
    public function mount($expense)
    {
        $this->expense = null;

        if($expense)
        {
            $this->expense = $expense;
        }
    }

    public function delete($id)
    {
        // we only allow for delete if the expense is not approved. 
        //to not let expense delete taking it out of the acccounting for the term
        if($this->expense->_approved == false)
        {
            Expense::find($id)->delete();
        session()->flash('message' , 'Deleted with success!');
        return $this->render();
        } 
        else
        {   
            session()->flash('message' , 'Cannot delete approved expenses, accounting reasons');
        }
    }

    public function render()
    {
        return view('livewire.accountant.expenses.delete-expense');
    }
}
