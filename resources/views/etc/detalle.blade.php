@extends('layouts.app')


@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-gray-800 pt-8 pb-8">
        <div class="flex flex-col md:flex-row">
            <!-- Primera columna -->
            <div class="lg:w-3/12 w-full lg:block hidden">
                <h4 class="font-semibold mb-3">Ver también</h4>
                <div class="pt-5 max-h-80">
                    <div class="max-h-80 overflow-y-scroll scrollbar-hide">
                        @forelse ($dics as $item)
                            <a class="hover:font-semibold" href="{{ route('aplicacion', $item->lxid) }}">
                                <h5>{{ $item->lx }} <sup>{!! $item->hm !!}</sup>
                                    ({{ $item->ps }})
                                    :
                                    {{ $item->min }}</h5>
                            </a>
                        @empty
                            <p>No hay otros que mostrar</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Segunda columna -->
            <div class="lg:w-9/12 w-full p-5 block">
                @if (isset($palabra->prin))

                    <h3 class="font-semibold text-2xl text-gray-800"><b>{{ $palabra->lx }}</b> <span
                            style="font-size: medium;">{!! $palabra->hm !!}
                            @if (isset($palabra->phon))
                                [{!! $palabra->phon !!}]
                            @endif {!! $palabra->sec !!}
                        </span>

                        @if (isset($palabra->audio))
                            @if (strpos($palabra->audio, 'http') === false)
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @else
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @endif
                        @endif

                    </h3>

                    <h3>{!! $palabra->predva !!}</h3>
                @else
                    <h2 class="font-semibold text-2xl text-gray-800">{{ $palabra->lx }}
                        <span class="text-gray-500 text-sm">
                            {!! $palabra->hm !!}
                            @if (isset($palabra->phon))
                                <span class="text-sm">[{!! $palabra->phon !!}]</span>
                            @endif
                            {!! $palabra->sec !!}
                        </span>


                        @if (isset($palabra->audio))
                            @if (strpos($palabra->audio, 'http') === false)
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @else
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @endif
                        @endif

                    </h2>

                    <div class="mt-3 bg-gray-300">
                        <h3>
                            {!! $palabra->predva !!}
                        </h3>
                    </div>

                @endif
                @if (isset($palabra->prin))
                    <div>
                        @include('prin')
                    </div>
                @else
                    <div class="bg-gray-300 p-5 rounded">
                        @include('sinprin')
                    </div>
                @endif
            </div>
        </div>
    </div>


    {{-- @foreach ($referencias as $referencia)
        <!-- referencia -->
        <div id="{{ $referencia->refid }}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal contenido-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">REFERENCIA</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ $referencia->author }}. {{ $referencia->year }}. {{ $referencia->title }}.
                            {{ $referencia->pub }}.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    @endforeach --}}

@endsection
