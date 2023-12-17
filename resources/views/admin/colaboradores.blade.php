@extends('layouts.admin')

@section('main')
    <main class="p-4 md:ml-64 h-auto pt-20">

        @if (session('mensaje'))
            <div id="toast-success"
                class="fixed bottom-5 right-5 bg-green-400 text-white p-4 rounded shadow transition-transform duration-500 transform translate-x-full">
                <div class="text-sm font-normal">{{ session('mensaje') }}</div>
            </div>
        @endif


        <nav class="flex justify-between items-center" aria-label="Breadcrumb">
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
                        <span class="ml-1 text-xl font-semibold text-gray-400 md:ml-2">Colaboradores</span>
                    </div>
                </li>
            </ol>
            <div class="text-end md:w-96">
                <button data-modal-target="abecedarioModal"
                    data-modal-toggle="abecedarioModal"class="text-white bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2"
                    type="button">
                    Nuevo
                </button>
            </div>
        </nav>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
            <table id="miTabla" class="w-full text-sm text-left">
                <thead class="text-xs text-gray-100 uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Nombre/s</th>
                        <th scope="col" class="px-6 py-3">Colaborador/es</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($colaboradores as $item)
                        <tr class="">
                            <th scope="row" class="px-6 py-4 ">
                                {{ $item->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->referencia }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay datos que mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <ul class="flex items-center justify-end space-x-2">
                @if ($colaboradores->onFirstPage())
                    <li
                        class="relative inline-flex items-center px-4 py-1.5 text-sm font-medium text-gray-100 bg-gray-700 cursor-not-allowed rounded">
                        Atras
                    </li>
                @else
                    <li>
                        <a href="{{ $colaboradores->previousPageUrl() }}"
                            class="relative inline-flex items-center px-4 py-1.5 text-sm font-medium text-gray-100 bg-gray-700 cursor-pointer rounded">
                            Atras
                        </a>
                    </li>
                @endif

                @for ($i = max($colaboradores->currentPage() - 2, 1); $i <= min($colaboradores->currentPage() + 1, $colaboradores->lastPage()); $i++)
                    <li>
                        <a href="{{ $colaboradores->url($i) }}"
                            class="pagination-item font-medium py-1.5 px-4 bg-gray-700 rounded text-gray-100">{{ $i }}</a>
                    </li>
                @endfor

                @if ($colaboradores->hasMorePages())
                    <li>
                        <a href="{{ $colaboradores->nextPageUrl() }}"
                            class="relative inline-flex items-center px-4 py-1.5 text-sm font-medium text-gray-100 bg-gray-700 cursor-pointer rounded">
                            Adelante
                        </a>
                    </li>
                @else
                    <li
                        class="relative inline-flex items-center px-4 py-1.5 text-sm font-medium text-gray-100 bg-gray-700 cursor-not-allowed rounded">
                        Adelante
                    </li>
                @endif
            </ul>
        </div>

        <!-- Main modal -->
        <div id="abecedarioModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative rounded-lg shadow bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 text-white">
                            Importar colaboradores
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                            data-modal-hide="abecedarioModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('colaboradores.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="p-6">
                            <label class="block text-sm mb-2 font-medium text-gray-900 text-white"
                                for="file_input">Seleccione el archivo .txt</label>
                            <input type="file" name="file" accept=".txt" @required(true)
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer  text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
                        </div>
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b border-gray-600">
                            <button data-modal-hide="abecedarioModal" type="submit"
                                class="px-5 py-2.5 rounded text-white bg-green-500">Importar</button>

                            <button data-modal-hide="abecedarioModal" type="button"
                                class="px-5 py-2.5 rounded text-white bg-red-600">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection
