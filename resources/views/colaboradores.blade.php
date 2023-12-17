@extends('layouts.app')

@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-gray-800 mb-3 mt-3">
        <h1 class="lg:text-6xl text-4xl font-semibold pb-4 text-center">COLABORADORES</h1>
        <h2 class="lg:text-3xl text-2xl font-semibold pb-3">Personas que han colaborado en la investigación</h2>

        <div class="colaboradores-listado columns-1 rounded pb-6 pt-4 ps-2 border border-gray-800">
            @forelse ($colaborador as $item)
                <p class="mt-5">
                    <h1 class="font-semibold">- {{ $item->nombre }}</h1>
                    <span>- {{ $item->referencia }}</span>
                </p>

            @empty
                <p>No hay datos que mostrar</p>
            @endforelse
        </div>

        <div class="mt-5 mb-8">
            <h1 class="pb-3 font-semibold text-2xl">Biólogos/geólogos consultados para la identificación de especies y rocas:
            </h1>
            <div class="columns-1 rounded pb-6 pt-4 ps-2 border border-gray-800">

                @forelse ($biologos as $item)
                    <p class="mt-2">
                        -<span class="font-semibold">{{ $item->cargo }}</span> :  <span>{{ $item->nombre }}</span>
                    </p>
                @empty
                    <p>No hay datos que mostrar</p>
                @endforelse

            </div>
        </div>
    </div>
@endsection
