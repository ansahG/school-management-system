<?php

namespace App\Http\Livewire\Accountant;
use App\Models\Accountant\Expense as Expenses;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $approvedCount = Expenses::where('_approved' , true)->count();
        $notApprovedCount = Expenses::where('_approved' , false)->count();  
        $projectedSpendings = Expenses::sum('_amountSpending');
        $totalSpent = Expenses::where('_approved' , true)->sum('_amountSpending');   
        return view('livewire.accountant.index',compact(['approvedCount','notApprovedCount', 'projectedSpendings','totalSpent' ]));
    }
}
