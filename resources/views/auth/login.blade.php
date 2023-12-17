@extends('layouts.access')

@section('main')
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <h2 class="text-2xl text-center font-bold text-gray-800">{{ __('Iniciar sesión - Tseltal') }}</h2>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Correo electrónico') }}</label>
                        <input id="email" type="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contraseña') }}</label>
                        <input id="password" type="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Recordarme') }}
                        </label>
                    </div>

                    <div class="mb-6">
                        <div class="mb-4 lg:flex">

                            <div class="w-full lg:w-1/2">
                                <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            </div>
                            <div class="w-full lg:w-1/2 lg:ml-4 mt-4 lg:mt-0">
                                <a href="{{ route('register') }}"
                                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline block text-center">
                                    <span class="text-white">{{ __('Registrarme') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <a href="{{ route('index') }}"
                                class="w-full bg-yellow-200 hover:bg-yellow-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline block text-center">
                                <span class="text-white">{{ __('Inicio') }}</span>
                            </a>
                        </div>
                        {{-- <div class="mt-3  text-center">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste la contraseña?') }}
                                </a>
                            @endif
                        </div> --}}
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
