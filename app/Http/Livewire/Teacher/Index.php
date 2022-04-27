<?php

namespace App\Http\Livewire\Teacher;
use App\Models\Classes\_Class;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $classes = _Class::where('_trashed', false)->get(['class', 'AKA']);
        return view('livewire.teacher.index', compact('classes'));
    }
}
