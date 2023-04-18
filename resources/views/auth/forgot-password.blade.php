<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Solo háganos saber su dirección de correo electrónico y le enviaremos un 
            enlace de restablecimiento de contraseña que le permitirá elegir uno nuevo.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-link
           :href="route('register')"
           >
            Crear Cuenta
           </x-link>
           <x-link
           :href="route('login')"
           >
            Inisiar Sesion
           </x-link>
        </div>
        <x-primary-button>
            Enviar instrucciónes 
        </x-primary-button>
    </form>
</x-guest-layout>
