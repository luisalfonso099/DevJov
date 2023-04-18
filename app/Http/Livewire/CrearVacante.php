<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;

class CrearVacante extends Component
{
    use WithFileUploads;

    public $vacante;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimoDia;
    public $descripcion;
    public $imagen;
    protected $rules = [
        'vacante' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimoDia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }

    public function enviarFormulario()
    {
        $data = $this->validate();
        $img = $this->imagen->store('public/vacantes');
        $img_name = str_replace('public/vacantes/', '', $img);

        Vacante::create([
            'titulo' => $data['vacante'],
            'salario_id' => $data['salario'],
            'categoria_id' => $data['categoria'],
            'empresa' => $data['empresa'],
            'ultimo_dia' => $data['ultimoDia'],
            'descripcion' => $data['descripcion'],
            'imagen' => $img_name,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('mensaje', 'Su vacante '.$data['vacante']. ' Fue creada con exito');
        return redirect()->route('vacantes.index');
    }
}
