@extends('layouts.admin')

@section('main')
    <main class="p-4 md:ml-64 h-auto pt-20">


        @if (session('mensaje'))
            <div id="toast-success"
                class="fixed bottom-5 right-5 bg-green-400 text-white p-4 rounded shadow transition-transform duration-500 transform translate-x-full">
                <div class="text-sm font-normal">{{ session('mensaje') }}</div>
            </div>
        @endif


        <nav class="flex justify-between items-center mb-5" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-1 md:space-x-3">
                <li class="flex items-center">
                    <a href="{{ route('home') }}"
                        class="flex items-center text-xl font-semibold text-gray-400 hover:text-gray-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-xl font-semibold text-gray-400 md:ml-2">Antecedentes</span>
                    </div>
                </li>
            </ol>
        </nav>




        <div id="editor">
            {!! $antecedentes ? $antecedentes->contenido : '' !!}
        </div>

        <form action="{{ route('guardarContenido') }}" method="post" id="formulario">
            @csrf
            <input type="hidden" name="contenido" id="contenido-hidden" @required(true)>
            <button type="button" id="guardar" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Guardar</button>
        </form>




    </main>
@endsection
