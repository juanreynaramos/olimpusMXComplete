<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('images/logo.png')}}">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="Nombre" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="Correo Electrónico" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="Confirma Contraseña" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="puesto" value="Puesto" />
                <select name="puesto" id="puesto" class="form-select rounded-md shadow-sm mt-1 block w-full">
                    <option value="ADMINISTRACION">ADMINISTRACION</option>
                    <option value="ASESOR">ASESOR</option>
                    <option value="ASISTENTE">ASISTENTE</option>
                    <option value="BECARIO">BECARIO</option>
                    <option value="CONSULTOR">CONSULTOR</option>
                    <option value="DIRECTOR">DIRECTOR</option>
                    <option value="GESTOR">GESTOR</option>
                    <option value="SEGUROS">SEGUROS</option>
                    <option value="SISTEMAS">SISTEMAS</option>
                    <option value="VENTAS">VENTAS</option>
                </select>
            </div>


            <div>
                <x-jet-label for="perfil" value="Perfil" />
                <select name="perfil" id="perfil" class="form-select rounded-md shadow-sm mt-1 block w-full">
                    <option value="ADMINISTRACION">ADMINISTRACION</option>
                    <option value="ASESOR">ASESOR</option>
                    <option value="ASISTENTE">ASISTENTE</option>
                    <option value="BECARIO">BECARIO</option>
                    <option value="CONSULTOR">CONSULTOR</option>
                    <option value="DIRECTOR">DIRECTOR</option>
                    <option value="GESTOR">GESTOR</option>
                    <option value="SEGUROS">SEGUROS</option>
                    <option value="SISTEMAS">SISTEMAS</option>
                    <option value="VENTAS">VENTAS</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    ¿Ya esta registrado?
                </a>

                <x-jet-button class="ml-4">
                    Registrar
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
