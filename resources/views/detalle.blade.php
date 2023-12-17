@extends('layouts.app')
@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-gray-800 pt-8 pb-8">

        <div class="flex flex-col md:flex-row">

            <!-- Primera columna -->
            <div class="lg:w-3/12 w-full lg:block hidden">
                <h4 class="font-semibold -mb-2">Ver también</h4>
                <div class="pt-5 max-h-80">
                    <div class="max-h-80 overflow-y-scroll scrollbar-hide border border-1 p-3">
                        @forelse ($palabras as $item)
                            <a class="hover:font-semibold" href="{{ route('aplicacion', $item->lxid) }}">
                                <h5>
                                    {{ $item->lx }}
                                    <sup>{!! $item->hm !!}</sup>
                                    ({{ $item->ps }})
                                    :
                                    {{ $item->min }}
                                </h5>
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

                    <h3 lass="font-semibold text-2xl text-gray-800">
                        <b class="text-2xl">
                            <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->lx) !!}</span>
                        </b>
                        <span style="font-size: medium;">
                            <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->hm) !!}</span>
                            @if (isset($palabra->phon))
                                [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->phon) !!}</span>]
                            @endif <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->sec) !!}</span>
                        </span>

                        @if (isset($palabra->audio))
                            @if (strpos($palabra->audio, 'http') === false)
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @else
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @endif
                        @endif

                    </h3>
                    <h3>
                        <span>{!! preg_replace(
                            '/<a href="(.*?)">(.*?)<\/a>/',
                            '<a href="$1" data-toggle="modal" data-target="#miModal" style="color: #00A7AE;">$2</a>',
                            $palabra->predva,
                        ) !!}</span>
                    </h3>
                @else
                    <h2 class="font-semibold text-2xl text-gray-800">
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->lx) !!}</span>
                        <span class="text-sm text-gray-400">
                            {!! $palabra->hm !!}
                            @if (isset($palabra->phon))
                                [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->phon) !!}</span>]
                            @endif
                            <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->sec) !!}</span>

                        </span>

                        @if (isset($palabra->audio))
                            @if (strpos($palabra->audio, 'http') === false)
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @else
                                <audio src="{{ asset('audios/' . $palabra->audio) }}" id="player{{ $palabra->id }}"
                                    type="audio/mpeg" preload="auto"></audio>

                                <button onclick="playAudio('{{ $palabra->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                                        <path
                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                    </svg>
                                </button>
                            @endif
                        @endif

                    </h2>


                    <div class="bg-gray-300 p-5 mt-3 rounded">
                        <span>{!! preg_replace(
                            '/<a href="(.*?)">(.*?)<\/a>/',
                            '<a href="$1" style="color: #00A7AE;">$2</a>',
                            $palabra->predva,
                        ) !!}</span>
                @endif



                @if (isset($palabra->prin))
                    @include('prin')
                @else
                    @include('sinprin')
                @endif
            </div>

        </div>
    </div>

    @foreach ($referencias as $referencia)
        <!-- referencia -->
        <div id="{{ $referencia->refid }}" class="modal fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <!-- Modal header -->
                    <div class="modal-header mb-4">
                        <h4 class="modal-title text-xl font-semibold">
                            REFERENCIA
                        </h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>
                            {{ $referencia->author }}. {{ $referencia->year }}. {{ $referencia->title }}.
                            {{ $referencia->pub }}.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer mt-4 text-right">
                        <!-- Botón de cerrar con data-dismiss="modal" -->
                        <button type="button"
                            class="btn btn-default px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray"
                            data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



@endsection
