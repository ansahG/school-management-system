<?php

namespace App\Http\Controllers\accountant;
use App\Models\Accountant\Expense as Expenses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class expenseController extends Controller
{ 
    public function approvedExpenses()
    {
        $pageTitle = 'Approved Expenses';
        $expenses = Expenses::where('_approved' , true)->paginate(10);
        return view('accountant.expenses.expensestable', compact(['expenses', 'pageTitle']));
    }


    public function unapprovedExpenses()
    {
        // $pageTitle = 'Unapproved Expenses';
        $expenses = Expenses::where('_approved' , false)->paginate(10); 
        return view('accountant.expenses.expensestable', compact(['expenses']));
    }

    public function viewExpense(Expenses $expense)
    {
        return view('accountant.expenses.viewEditExpense', compact(['expense'])); 
    }

}

// {{ $showEmployeeData->links() }}