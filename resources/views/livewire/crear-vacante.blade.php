<form class="space-y-5 w-2/5" wire:submit.prevent="enviarFormulario">
    <div class="mt-5">
        <x-input-label for="vacante" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="vacante" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="vacante" 
        :value="old('vacante')" 
        placeholder="Titulo Vacante" 
        />
        @error('vacante')
            <livewire:mostrar-error :message="$message">
        @enderror
    </div>
      
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            wire:model="salario"
            id="salario"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option >--- Seleccione un salario ---</option>
            @foreach($salarios as $salario)
                <option value="{{$salario->id}}">--- {{$salario->salario}} ---</option>
            @endforeach
        </select> 
        @error('salario')
            <livewire:mostrar-error :message="$message">
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
            wire:model="categoria"
            id="categoria"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option >--- Seleccione una categoria ---</option>
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">--- {{$categoria->categoria}} ---</option>
            @endforeach
        </select> 
        @error('categoria')
            <livewire:mostrar-error :message="$message">
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
        id="empresa" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')" 
        placeholder="Empresa: ej. Netflix, Uber" 
        />
        @error('empresa')
            <livewire:mostrar-error :message="$message">
        @enderror
    </div>

    <div>
        <x-input-label for="ultimoDia" :value="__('Ultimo dia para portularse')" />
        <x-text-input 
        id="ultimoDia" 
        class="block mt-1 w-full" 
        type="date" 
        wire:model="ultimoDia" 
        :value="old('ultimoDia')" 
        />
        @error('ultimoDia')
            <livewire:mostrar-error :message="$message">
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del puesto')" />
        <textarea 
        class="w-full h-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        id="descripcion" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="descripcion"
        placeholder="Descripcion del puesto, experiencia" 
        ></textarea>
        @error('descripcion')
            <livewire:mostrar-error :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
        id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model="imagen" 
        accept="image/*"
        />
        @error('imagen')
            <livewire:mostrar-error :message="$message">
        @enderror
        <div class="my-5 w-80">
            @if ($imagen)
            Imagen:
                <img src="{{ $imagen->temporaryUrl() }}">
            @endif
        </div>
       
    </div>
    
    <x-primary-button>
        Crear Vacante
    </x-primary-button>
           
</form>
