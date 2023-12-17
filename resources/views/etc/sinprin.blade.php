@if (isset($palabra->va))
    <h3>Variación impredecible: {!! $palabra->va !!}</h3>
@endif
<h3>{!! $palabra->psext !!}</h3>



@if (isset($palabra->lxdial))
    <h3>Se usa en: <span class="text-teal-800">{!! $palabra->lxdial !!}</span></h3>

    @if (isset($palabra->cfdial))
        (véase → <a href="#otros" class="text-blue-500">Otros lugares</a>)
    @endif
@endif


@if (isset($palabra->mor))
    <h3>Morfología:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->mor) !!}</span>
        @if (isset($palabra->morcom))
            ({!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->morcom) !!})
        @endif
    </h3>

@endif




@if (isset($palabra->et))
    <h3>{!! $palabra->et !!}</h3>
@endif

@if (isset($palabra->abst))
    <h3>Sustantivo abstracto: {!! $palabra->abst !!}</h3>
@endif

@if (isset($palabra->atr))
    <h3>Forma atributiva: {$palabra->atr}</h3>
@endif

@if (isset($palabra->inf))
    <h3>Infinitivo: {!! $palabra->inf !!}</h3>
@endif

@if (isset($palabra->nopos))
    <h3>Forma no poseída: {!! $palabra->nopos !!}</h3>
@endif

@if (isset($palabra->pl))
    <h3>Plural: {!! $palabra->pl !!}</h3>
@endif

@if (isset($palabra->plpos))
    <h3>Plural poseído: {!! $palabra->plpos !!}</h3>
@endif

@if (isset($palabra->pm))
    <h3>Posesión marcada: <span class="text-blue-500">{!! $palabra->pm !!}</span></h3>
@endif

</div>

<br>


<?php
$cadena = $palabra->idsn ?? '';
$sn = 1;
$array = explode(';', $cadena);
?>

<ol class="pl-5 mt-2 list-decimal">
    @foreach ($array as $ar)
        @foreach ($sentidos as $sentido)
            @if ($ar == $sentido->id)
                <li id="sn{!! $sn++ !!}">
                    <h4>

                        @if (isset($sentido->sndial))
                            [{!! $sentido->sndial !!}]
                        @endif
                        <span class="text-black bg-yellow-500" id="definicion">
                            {!! $sentido->de !!}
                        </span>
                    </h4>
                </li>

                @if (preg_match('/<a\b[^>]*>(.*?)<\/a>/', $sentido->sc))
                    <h4 style="color: blue;">{!! $sentido->sc !!}</h4>
                @else
                    <h4>{!! $sentido->sc !!}</h4>
                @endif

                <div class="row">
                    @if (isset($sentido->pc1))
                        <div class="col-xs-4">
                            <img src="{{ asset('imagenes/' . $sentido->pc1) }}" alt="imagen" class="w-64 h-auto">
                        </div>
                    @endif

                    @if (isset($sentido->pc2))
                        <div class="col-xs-4">
                            <img src="{{ asset('imagenes/' . $sentido->pc2) }}" alt="imagen" class="w-64 h-auto">

                        </div>
                    @endif

                    @if (isset($sentido->pc3))
                        <div class="col-xs-4">
                            <img src="{{ asset('imagenes/' . $sentido->pc3) }}" alt="imagen" class="w-64 h-auto">

                        </div>
                    @endif
                </div>


                <?php
                $cadena2 = $sentido->exnum;
                $array2 = explode(';', $cadena2);
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
                                                id="player{{ $exnum->id }}" type="audio/mpeg" preload="auto"></audio>

                                            <button onclick="playAudio('{{ $exnum->id }}')"
                                                class="bg-gray-800 p-2 rounded mt-3 ml-2">
                                                <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 14 16">
                                                    <path
                                                        d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                </svg>
                                            </button>
                                        @else
                                            <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                id="player{{ $exnum->id }}" type="audio/mpeg" preload="auto"></audio>

                                            <button onclick="playAudio('{{ $exnum->id }}')"
                                                class="bg-gray-800 p-2 rounded mt-3 ml-2">
                                                <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 14 16">
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
                            <span class="text-black bg-yellow-500 list-square" id="definicion">{!! $sentido->de2 !!}
                                </>
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
                                    <div class="flex items-center">
                                        <h4>[{!! $exnum->xdial !!}]
                                            <span class="text-blue-600">{!! $exnum->xv !!}</span>
                                            <span class="text-black">{!! $exnum->xe !!}</span>
                                        </h4>

                                        @if (isset($exnum->audio))
                                            @if (strpos($exnum->audio, 'http') === false)
                                                <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                    id="player{{ $exnum->id }}" type="audio/mpeg"
                                                    preload="auto"></audio>

                                                <button onclick="playAudio('{{ $exnum->id }}')"
                                                    class="bg-gray-800 p-2 rounded mt-3 ml-2">
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
                                                    class="bg-gray-800 p-2 rounded mt-3 ml-2">
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
                            <span class="text-black bg-yellow-500 list-square" id="definicion">{!! $sentido->de3 !!}
                                </>
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
                                            id="player{{ $exnum->id }}" type="audio/mpeg" preload="auto"></audio>

                                        <button onclick="playAudio('{{ $exnum->id }}')"
                                            class="bg-gray-800 p-2 rounded mt-3">
                                            <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 14 16">
                                                <path
                                                    d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                            </svg>
                                        </button>
                                    @else
                                        <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                            id="player{{ $exnum->id }}" type="audio/mpeg" preload="auto"></audio>

                                        <button onclick="playAudio('{{ $exnum->id }}')"
                                            class="bg-gray-800 p-2 rounded mt-3">
                                            <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 14 16">
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
                    <h4>
                        <span class="font-bold">Véase</span> :
                        {!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->sncf) !!}
                    </h4>
                @endif
                @if (isset($sentido->sncfdial))
                    <h4>Otros lugares: {!! $sentido->sncfdial !!}</h4>
                @endif
            @endif
        @endforeach
    @endforeach

</ol>


@if (isset($palabra->cfdial))

    <h4 id="otros">Otros lugares:</h4>

    <?php
    $cadena4 = $palabra->cfdial;
    $array4 = explode(';', $cadena4);
    ?>

    @foreach ($array4 as $ar4)
        <h4>∎ {!! $ar4 !!}</h4>
    @endforeach

@endif


@if (isset($palabra->cf))
    <h4>
        <span class="font-bold">Véase</span> :
        {!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->cf) !!}
    </h4>
@endif

@if (isset($palabra->phr))
    <h4>Aparece en la expresión siguiente: {!! $palabra->phr !!}</h4>
@endif

@if (isset($palabra->agn))
    <h4>Sustantivo de persona (agentivo): {!! $palabra->agn !!}</h4>
@endif

@if (isset($palabra->dif))
    <h4>Forma difusiva: <span class="text-teal-500">{!! $palabra->dif !!}</span></h4>
@endif

@if (isset($palabra->sp))
    <h4>{!! $palabra->sp !!}</h4>
@endif

@if (isset($palabra->alisto))
    <h4>Más información sobre la variación dialectal de esta forma <a target="_blank"
            href="{!! $palabra->alisto !!}">aquí</a>.</h4>
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
