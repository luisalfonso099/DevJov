<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarError extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.mostrar-error');
    }
}
