<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center ">
            <div class="leading-10">
                <a href="#" class="text-xl font-bold">
                     {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-400 font-bold">
                    {{$vacante->empresa}}
                </p>
                <p class="text-sm text-gray-300">
                    {{$vacante->ultimo_dia->format('d/m/Y')}}
                </p>
            </div>
            <div class="flex gap-3 flex-col items-stretch mt-2 md:mt-0">
                <a href="#" class="bg-slate-500 py-2 px-4 rounded text-center font-bold uppercase text-xs text-white ">
                    Candidatos
                </a>
                <a href="{{route('vacantes.edit',$vacante->id)}}" class="bg-blue-800 py-2 px-4 rounded text-center font-bold uppercase text-xs text-white ">
                    Editar
                </a>
                <a wire:click="$emit('openModal', {{$vacante->id}})" href="#" class="bg-red-500 py-2 px-4 rounded text-center font-bold uppercase text-xs text-white ">
                    Eliminar
                </a>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
    @endforelse
    <div>
        {{$vacantes->links()}}
    </div>
</div>

        
        
