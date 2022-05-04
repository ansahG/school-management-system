<?php

namespace App\Http\Livewire\Administrator;
use App\Models\Accountant\Expense as Expenses;
use App\Models\Administrator\Events\Event;
use App\Models\Administrator\Student;
use App\Models\Classes\_Class;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;


class Index extends Component
{
    public function render()
    {
        $employeesCount = User::count();//come later and remove the admin Id from the list
        $studentsCount = Student::count();
        $classesCount = _Class::count();
        $upcomingEventsCount = Event::where('_eventDate', '>' , Carbon::today())->count();
        $unapprovedExpenses =  Expenses::where('_approved' , false)->count();
        $approvedExpense =  Expenses::where('_approved' , true)->count();
        $projectedSpendings = Expenses::sum('_amountSpending');
        $totalSpent = Expenses::where('_approved' , true)->sum('_amountSpending');

        return view('livewire.Administrator.index', compact(['employeesCount', 'studentsCount','classesCount','upcomingEventsCount', 'unapprovedExpenses', 'approvedExpense','projectedSpendings', 'totalSpent' ]));
    }
}
