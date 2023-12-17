@extends('layouts.app')

@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-start text-gray-800 mb-3 mt-3">
        <div class="mt-9 mb-9 gap-2">
            @if (isset($palabras))
                <div class="table-responsive">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @for ($i = 0; $i < count($palabras); $i += ceil(count($palabras) / 4))
                            <div class="mb-4">
                                @for ($j = $i; $j < $i + ceil(count($palabras) / 4) && $j < count($palabras); $j++)
                                    <a href="{{ route('aplicacion', $palabras[$j]->lxid) }}" class="hover:text-white hover:font-semibold p-2 block mb-2">
                                        <h3 class="m-0">
                                            <b>{!! $palabras[$j]->lx !!} <sup>{!! $palabras[$j]->hm !!}</sup></b>
                                            @if (isset($palabras[$j]->ps))
                                                ({{ $palabras[$j]->ps }}):
                                            @endif
                                            @if (isset($palabras[$j]->min))
                                                {!! $palabras[$j]->min !!}
                                            @endif
                                        </h3>
                                    </a>
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
