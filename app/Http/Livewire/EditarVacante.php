<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacante;
use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;


class EditarVacante extends Component
{

    use WithFileUploads;

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimoDia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimoDia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',
    ];

    public function editarVacante()
    {
        $data = $this->validate();

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $data['imagen'] = str_replace('public/vacantes/','',$imagen);
        }

        $vacante = Vacante::find($this->vacante_id);

        $vacante->titulo = $data['titulo'];
        $vacante->salario_id = $data['salario'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->empresa = $data['empresa'];
        $vacante->ultimo_dia = $data['ultimoDia'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->imagen = $data['imagen'] ?? $vacante->imagen;

         $vacante->save();

        session()->flash('mensaje','La vacante fue actualizada con exito');

        return redirect()->route('vacantes.index');
    }

    public function mount(Vacante $vacante)
    {

        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimoDia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
        
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
