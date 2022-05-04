<?php

namespace App\Http\Controllers\Administrator;
use App\Models\Accountant\Expense as Expenses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class expenseController extends Controller
{
    public function adminApproved()
    {
         $expenses = Expenses::where('_approved' , true)->paginate(10);
         return view('administrator.adminExpenses.loadExpenses', compact('expenses'));
    }

    public function adminUnapproved()
    {
       $expenses = Expenses::where('_approved' , false)->paginate(10); 
        return view('administrator.adminExpenses.loadExpenses', compact('expenses'));
    }

    public function expenseView(Expenses $expense)
    {
        return view('administrator.adminExpenses.viewExpense' , compact('expense'));
    }
}
