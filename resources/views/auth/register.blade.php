
@extends('layouts.access')

@section('main')
    <div class="flex justify-center items-center min-h-screen"> <!-- Cambia min-h-fit a min-h-screen -->
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 py-6">
                <div class="mb-4 text-2xl text-center font-bold">{{ __('Registrarme - Tseltal') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre') }}</label>
                        <input id="name" type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Correo electrónico') }}</label>
                        <input id="email" type="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contraseña') }}</label>
                        <input id="password" type="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirmar contraseña') }}</label>
                        <input id="password-confirm" type="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="mb-4 lg:flex">
                        <div class="w-full lg:w-1/2">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <span class="text-white">{{ __('Registrarme') }}</span>
                            </button>
                        </div>
                        <div class="w-full lg:w-1/2 lg:ml-4 mt-4 lg:mt-0">
                            <a href="{{ route('login') }}"
                                class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline block text-center">
                                <span class="text-white">{{ __('Cancelar') }}</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
