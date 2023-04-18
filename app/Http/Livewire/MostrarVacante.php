<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class MostrarVacante extends Component
{

    protected $listeners = ['eliminarVacante'];
    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacante',[
            'vacantes'=>$vacantes
        ]);
    }

    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }
}
