<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

		@livewire('teacher.report-card' , ['student' => $student, 'classes' => $classes])


</x-app-layout>