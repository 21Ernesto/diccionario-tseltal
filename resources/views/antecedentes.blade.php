@extends('layouts.app')

@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-gray-800 mb-3 mt-3">
        <h1 class="lg:text-6xl text-4xl font-semibold pb-4 text-center">ANTECEDENTES</h1>
        <div class="descripcion text-1xl">
            {!! $antecedentes ? $antecedentes->contenido : '' !!}
        </div>
    </div>
@endsection
