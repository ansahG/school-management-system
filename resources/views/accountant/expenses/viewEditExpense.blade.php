
         


<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __(auth()->user()->name) }}
        </h2>
    </x-slot>

<div class="container">
  <div class="card">
 @livewire('accountant.expenses.expense-form' , ['expense' => $expense])
  </div>
</div>
</x-app-layout>