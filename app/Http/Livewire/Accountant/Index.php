<?php

namespace App\Http\Livewire\Accountant;
use App\Models\Accountant\Expense as Expenses;
use App\Models\Accountant\SchoolFee;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $approvedCount = Expenses::where('_approved' , true)->count();
        $notApprovedCount = Expenses::where('_approved' , false)->count();  
        $projectedSpendings = Expenses::sum('_amountSpending');
        $totalSpent = Expenses::where('_approved' , true)->sum('_amountSpending');   
        // load and sum amount of the school fees without adding negative values as they only allow to know who owes, see below for further detail
        $totalFees = SchoolFee::where('amount' , '>', 0)->sum('amount');
        $studentWhoPaid = SchoolFee::where('amount' , '>', 0)->count();

        return view('livewire.accountant.index',compact(['approvedCount','notApprovedCount', 'projectedSpendings','totalSpent', 'totalFees' ,'studentWhoPaid']));
    }
}

// suppose we are loading and summing all, people who owes money which is negative will affect the rest of the summation is is paid 
// say kofi paid 1 cedi but kwame owes 1 cedi, menin the system will return a zero amount for schoolfees if summed but that not to be the case, we only sum those paid and leave the rest unpaid or owing