@extends('layouts.app')

@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-center text-gray-800 mb-3 mt-3">
        <h1 class="lg:text-6xl text-4xl font-semibold pb-4">DITSEL</h1>
        <h2 class="lg:text-3xl text-2xl font-medium pb-2">Diccionario Tseltal en Línea</h2>
        <span class="text-1xl">
            {!! $home ? $home->contenido : '' !!}
        </span>
    </div>
@endsection
