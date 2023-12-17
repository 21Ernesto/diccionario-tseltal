@extends('layouts.admin')

@section('main')
    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-4">
            <div
                class="border-2 text-center pt-3 font-semibold border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                Abecedario
            </div>
            <div
                class="border-2 text-center pt-3 font-semibold border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                Diccionario
            </div>
            <div
                class="border-2 text-center pt-3 font-semibold border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
                Exnums
            </div>
            <div
                class="border-2 text-center pt-3 font-semibold border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
                Sentidos
            </div>
            <div
                class="border-2 text-center pt-3 font-semibold border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
                Referencias
            </div>
        </div>
    </main>
@endsection
