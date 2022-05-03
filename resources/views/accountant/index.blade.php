




<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __(auth()->user()->name) }}
        </h2>
    </x-slot>

<div class="container">
  <div class="card">
     @livewire('accountant.index')
  </div>
</div>
</x-app-layout>







{{-- how we get here after a user login is well programmed on the dashboard page that sits in this app. it only has a switch statement that displayes which page based on user department. In this case a teachwer comes here --}}
{{-- for the query since we do not go through the controller, we will use loivewire which will make student and class query for us without the use of the controler. Life got simple --}}



