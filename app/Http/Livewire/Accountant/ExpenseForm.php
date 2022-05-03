<?php

namespace App\Http\Livewire\Accountant;
use App\Models\Accountant\Expense;
use Livewire\Component;

class ExpenseForm extends Component
{
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


    public function addExpense()
    {
       $data = $this->validate([
        '_expenseTitle'=> ['bail', 'required','string'],
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
        return view('livewire.accountant.expense-form');
    }
}
