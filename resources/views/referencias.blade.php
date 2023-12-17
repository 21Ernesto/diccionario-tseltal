@extends('layouts.app')

@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-center text-gray-800 mb-3 mt-3">




        <div class="mt-9 mb-9">
            <div class="mt-5 mb-5 text-start grid lg:grid-cols-1 lg:gap-5 gap-2">

                @forelse($referencia as $item)

                    <p>
                        <span>{{ $item->year }}</span> <br>
                        <span>{{ $item->author }}</span> <br>
                        <span class="font-semibold">{{ $item->title }}</span> <br>
                        <span>{{ $item->pub }}</span> <br>
                    </p>


                @empty
                    <p class="col-span-4">No hay datos que mostrar</p>
                @endforelse

            </div>
        </div>




    </div>
@endsection
