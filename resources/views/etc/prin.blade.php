<h3>{!! $palabra->gl !!}</h3>

<h3>
    @if (isset($palabra->lxdial))
        Se usa en: <span class="text-teal-800">{!! $palabra->lxdial !!}</span>
    @endif
    @if (isset($palabra->cfdial))
        (véase → <a href="#otros">Otros lugares</a>)
    @endif
</h3>


@if (isset($palabra->mor))
    <h3 class="bg-gray-300">Morfología: <span class="text-teal-500">{!! $palabra->mor !!}</span>
        @if (isset($palabra->morcom))
            ({!! $palabra->morcom !!} )
        @endif
    </h3>
@endif

{{-- REALICE UN CAMBIO AQUÍ $dic POR $dics --}}
@foreach ($dics as $dic)
    @if (rtrim($palabra->prin) == rtrim($dic->lxid))

        <h3>Variante de:</h3>
        <h2 class="text-blue-500 mt-5">
            <b>{!! $dic->lx !!}</b>
            <span class="font-medium text-gray-500">
                {!! $dic->hm !!}
                @if (isset($dic->phon))
                    [{!! $dic->phon !!}]
                @endif
                {!! $dic->sec !!}
            </span>


            @if (isset($dic->audio))
                @if (strpos($dic->audio, 'http') === false)
                    <audio src="{{ asset('audios/' . $dic->audio) }}" id="player{{ $dic->id }}" type="audio/mpeg"
                        preload="auto"></audio>

                    <button onclick="playAudio('{{ $dic->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                            <path
                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                        </svg>
                    </button>
                @else
                    <audio src="{{ asset('audios/' . $dic->audio) }}" id="player{{ $dic->id }}" type="audio/mpeg"
                        preload="auto"></audio>

                    <button onclick="playAudio('{{ $dic->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                            <path
                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                        </svg>
                    </button>
                @endif
            @endif

        </h2>

        {{-- <div > --}}
        <div class="bg-gray-300 p-7 mt-3 mb-3 rounded">
            <h3>
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->predva) !!}</span>
            </h3>


            @if (isset($dic->va))
                <h4><span class="font-bold">Variación impredecible</span> :
                    <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->va) !!}</span>
                </h4>
            @endif

            <h4>
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->psext) !!}</span>
            </h4>

            <h4>
                @if (isset($dic->lxdial))
                    <h4><span class="font-bold">Se usa en</span> :
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->lxdial) !!}</span>
                    </h4>
                @endif
                @if (isset($dic->cfdial))
                    (véase → <a href="#otros">Otros lugares</a>)
                @endif
            </h4>


            @if (isset($dic->mor))
                <h4 class="bg-gray-300">Morfología:
                    <span>{!! $palabra->mor !!}
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->mor) !!}</span>

                    </span>
                    @if (isset($dic->morcom))
                        ({!! $dic->morcom !!} )
                    @endif
                </h4>
            @endif



            @if (isset($dic->et))
                <h4>{!! $palabra->et !!}</h4>
            @endif

            @if (isset($dic->abst))
                <h4>Sustantivo abstracto: {!! $dic->abst !!}</h4>
            @endif

            @if (isset($dic->atr))
                <h4>Forma atributiva: {!! $dic->atr !!}</h4>
            @endif

            @if (isset($dic->inf))
                <h4>Infinitivo: {!! $dic->inf !!}</h4>
            @endif

            @if (isset($dic->nopos))
                <h4>Forma no poseída: {!! $dic->nopos !!}</h4>
            @endif

            @if (isset($dic->pl))
                <h4>Plural: {!! $dic->pl !!}</h4>
            @endif

            @if (isset($dic->plpos))
                <h4>Plural poseído: {!! $dic->plpos !!}</h4>
            @endif

            @if (isset($dic->pm))
                <h4>Posesión marcada: <span class="text-blue-600">{!! $dic->pm !!}</span></h4>
            @endif


        </div>

        <?php
        $cadena = $dic->idsn;
        $array = explode(';', $cadena);
        $sn = 1;
        ?>

        <ol class="pl-5 mt-2 list-decimal">
            @foreach ($array as $ar)
                @foreach ($sentidos as $sentido)
                    @if ($ar == $sentido->id)
                        <li id="sn{{ $sn++ }}">
                            <h4>

                                @if (isset($sentido->sndial))
                                    [{!! $sentido->sndial !!}]
                                @endif
                                <span class="text-black bg-yellow-400" id="definicion">
                                    {!! $sentido->de !!}
                                </span>
                            </h4>
                        </li>

                        <h4>{!! $sentido->sc !!}</h4>

                        <div class="row">
                            @if (isset($sentido->pc1))
                                <div class="col-xs-4">
                                    <img src="{{ asset('imagenes/' . $sentido->pc1) }}" alt="imagen"
                                        class="w-64 h-auto">
                                </div>
                            @endif

                            @if (isset($sentido->pc2))
                                <div class="col-xs-4">
                                    <img src="{{ asset('imagenes/' . $sentido->pc2) }}" alt="imagen"
                                        class="w-64 h-auto">

                                </div>
                            @endif

                            @if (isset($sentido->pc3))
                                <div class="col-xs-4">
                                    <img src="{{ asset('imagenes/' . $sentido->pc3) }}" alt="imagen"
                                        class="w-64 h-auto">

                                </div>
                            @endif
                        </div>



                        <?php
                        $cadena2 = $sentido->exnum;
                        $array2 = explode(';', $cadena2); //REALICE UN CAMBIO AQUÍ la , por ;
                        ?>



                        @foreach ($array2 as $ar2)
                            @foreach ($exnums as $exnum)
                                @if (isset($exnum->exnum))
                                    @if ($ar2 == $exnum->exnum)
                                        <div class="flex items-center">
                                            <h4>[{!! $exnum->xdial !!}]
                                                <span class="text-blue-700">{!! $exnum->xv !!}</span>
                                                <span class="text-black">{!! $exnum->xe !!}</span>
                                            </h4>
                                            @if (isset($exnum->audio))
                                                @if (strpos($exnum->audio, 'http') === false)
                                                    <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="auto"></audio>

                                                    <button onclick="playAudio('{{ $exnum->id }}')"
                                                        class="bg-gray-800 p-2 rounded mt-3">
                                                        <svg class="w-3 h-3 text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 14 16">
                                                            <path
                                                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="auto"></audio>

                                                    <button onclick="playAudio('{{ $exnum->id }}')"
                                                        class="bg-gray-800 p-2 rounded mt-3">
                                                        <svg class="w-3 h-3 text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 14 16">
                                                            <path
                                                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                            @endif


                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach

                        @if (isset($sentido->de2))
                            <h4>

                                @if (isset($sentido->sndial))
                                    [{!! $sentido->sndial !!}]
                                @endif

                                <li class="flex items-center space-x-3">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M16 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 17h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="text-black bg-yellow-500 list-square"
                                        id="definicion">{!! $sentido->de2 !!}</>
                                </li>
                            </h4>

                            <?php
                            $cadenados = $sentido->exnum2;
                            $arraydos = explode(';', $cadenados);
                            ?>



                            @foreach ($arraydos as $ardos)
                                @foreach ($exnums as $exnum)
                                    @if (isset($exnum->exnum))
                                        @if ($ardos == $exnum->exnum)
                                            @if (isset($exnum->audio))
                                                @if (strpos($exnum->audio, 'http') === false)
                                                    <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="auto"></audio>

                                                    <button onclick="playAudio('{{ $exnum->id }}')"
                                                        class="bg-gray-800 p-2 rounded mt-3">
                                                        <svg class="w-3 h-3 text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 14 16">
                                                            <path
                                                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="auto"></audio>

                                                    <button onclick="playAudio('{{ $exnum->id }}')"
                                                        class="bg-gray-800 p-2 rounded mt-3">
                                                        <svg class="w-3 h-3 text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 14 16">
                                                            <path
                                                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                            @endif


                                            <h4>
                                                [{!! $exnum->xdial !!}]
                                                <span class="text-blue-600">{!! $exnum->xv !!}</span>
                                                <span class="text-black">{!! $exnum->xe !!}</span>
                                            </h4>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endif

                        @if (isset($sentido->de3))
                            <h4>
                                @if (isset($sentido->sndial))
                                    [{!! $sentido->sndial !!}]
                                @endif
                                <li class="flex items-center space-x-3">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M16 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 17h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="text-black bg-yellow-500 list-square"
                                        id="definicion">{!! $sentido->de3 !!}</>
                                </li>
                            </h4>

                            <?php
                            $cadena3 = $sentido->exnum3;
                            $array3 = explode(';', $cadena3);
                            ?>

                            @foreach ($array3 as $ar3)
                                @foreach ($exnums as $exnum)
                                    @if ($ar3 == $exnum->exnum)
                                        @if (isset($exnum->audio))
                                            @if (strpos($exnum->audio, 'http') === false)
                                                <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                    id="player{{ $exnum->id }}" type="audio/mpeg"
                                                    preload="auto"></audio>

                                                <button onclick="playAudio('{{ $exnum->id }}')"
                                                    class="bg-gray-800 p-2 rounded mt-3">
                                                    <svg class="w-3 h-3 text-gray-800 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 14 16">
                                                        <path
                                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                    </svg>
                                                </button>
                                            @else
                                                <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                    id="player{{ $exnum->id }}" type="audio/mpeg"
                                                    preload="auto"></audio>

                                                <button onclick="playAudio('{{ $exnum->id }}')"
                                                    class="bg-gray-800 p-2 rounded mt-3">
                                                    <svg class="w-3 h-3 text-gray-800 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 14 16">
                                                        <path
                                                            d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                    </svg>
                                                </button>
                                            @endif
                                        @endif

                                        <h4>
                                            [{!! $exnum->xdial !!}]
                                            <span class="text-blue-600">{!! $exnum->xv !!}</span>
                                            <span class="text-black">{!! $exnum->xe !!}</span>
                                        </h4>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif


                        @if (isset($sentido->sy))
                            <h4>Sinónimo(s): {!! $sentido->sy !!}</h4>
                        @endif
                        @if (isset($sentido->sncf))
                            <h4><span class="font-bold">Véase</span> :
                                @if (preg_match('/<a\b[^>]*>(.*?)<\/a>/', $sentido->sncf))
                                    <h4 style="color: blue;">{!! $sentido->sncf !!}</h4>
                                @else
                                    <h4>{!! $sentido->sncf !!}</h4>
                                @endif
                            </h4>
                        @endif
                        @if (isset($sentido->sncfdial))
                            <h4>Otros lugares: <span class="text-blue-500">{!! $sentido->sncfdial !!}</span></h4>
                        @endif
                    @endif
                @endforeach
            @endforeach

        </ol>


        <br>


        @if (isset($dic->cfdial))
            <h4 id="otros">Otros lugares:</h4>

            <?php
            $cadena4 = $dic->cfdial;
            $array4 = explode(';', $cadena4);
            ?>

            @foreach ($array4 as $ar4)
                <h4>∎ {!! $ar4 !!}</h4>
            @endforeach
        @endif


        @if (isset($dic->cf))
            <h4><span class="font-bold">Véase</span> :
                @if (preg_match('/<a\b[^>]*>(.*?)<\/a>/', $dic->cf))
                    <h4 style="color: blue;">{!! $dic->cf !!}</h4>
                @else
                    <h4>{!! $dic->cf !!}</h4>
                @endif
            </h4>
        @endif

        @if (isset($dic->phr))
            <h4>Aparece en la expresión siguiente: {!! $dic->phr !!}</h4>
        @endif

        @if (isset($dic->agn))
            <h4>Sustantivo de persona (agentivo): {!! $dic->agn !!}</h4>
        @endif

        @if (isset($dic->dif))
            <h4>Forma difusiva: <span class="text-teal-500">{!! $dic->dif !!}</span></h4>
        @endif

        @if (isset($dic->sp))
            <h4>{{ $dic->sp }}</h4>
        @endif

        @if (isset($dic->alisto))
            <h4>Más información sobre la variación dialectal de esta forma <a target="_blank"
                    href="{{ $dic->alisto }}">aquí</a>.</h4>
        @endif

        @if (isset($palabra->morinv))
            @php
                $morinvs = explode(';', $palabra->morinv);
                $numero = 0;
                $morinvas = [];

                foreach ($morinvs as $morinv) {
                    $numero++;
                    if ($numero <= 15) {
                        $morinvas[] = $morinv;
                    } else {
                        break;
                    }
                }
            @endphp

            @if (isset($palabra->morinv))
                @php
                    $morinvs = explode(';', $palabra->morinv);
                    $numero = 0;
                    $morinvas = [];
                @endphp

                <h3 class="text-xl font-bold mt-3 mb-2">Es parte de:</h3>

                <div class="morinvas-container">
                    @foreach ($morinvs as $morinv)
                        @php
                            $numero++;
                        @endphp

                        <button type="button"
                            class="morinv-button mt-3 border border-gray-500 hover:bg-gray-200 text-teal-400 py-2 px-4 rounded {{ $numero > 20 ? 'hidden' : '' }}">
                            {!! $morinv !!}
                        </button>

                        @if ($numero > 20)
                            @php
                                $morinvas[] = $morinv;
                            @endphp
                        @endif
                    @endforeach

                    @if (!empty($morinvas))
                        <div id="morinvas-collapsible" class="morinvas-collapsible hidden">
                            @foreach ($morinvas as $morinv)
                                <button type="button"
                                    class="morinv-button mt-3 border border-gray-500 hover:bg-gray-200 text-teal-400 py-2 px-4 rounded">
                                    {!! $morinv !!}
                                </button>
                            @endforeach
                        </div>

                        <div class="mt-5">
                            <a href="#morinvas-collapsible"
                                class="morinv-toggle mt-10 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Ver
                                Más...</a>
                        </div>
                    @endif
                </div>
            @endif
        @endif



    @endif
@endforeach
