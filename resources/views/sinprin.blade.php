
@if (isset($palabra->va))
    <h3 class="mt-3">Variación impredecible:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->va) !!}</span>
    </h3>
@endif
<h3 class="mt-3">
    <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->psext) !!}</span>
</h3>



<h3 class="mt-3">
    @if (isset($palabra->lxdial))
        Se usa en:
        <span style="color: #306A1B">{!! $palabra->lxdial !!}</span>
    @endif
    @if (isset($palabra->cfdial))
        ( <span style="color: #306A1B">véase</span> → <a href="#otros">Otros lugares</a>)
    @endif
</h3>


@if (isset($palabra->mor))
    <h3 class="mt-3">Morfología:
        <span>{!! preg_replace(
            '/<a href="(.*?)">(.*?)<\/a>/',
            '<a href="$1" style="color: #00A7AE;">$2</a>',
            $palabra->mor
        ) !!}</span>
        @if (isset($palabra->morcom))
            (<span>{!! preg_replace(
                '/<a href="(.*?)">(.*?)<\/a>/',
                '<a href="$1" style="color: #00A7AE;">$2</a>',
                $palabra->morcom
            ) !!}</span>)
        @endif
    </h3>
@endif




@if (isset($palabra->et))
    <h3 class="mt-3">
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->et) !!}</span>
    </h3>
@endif

@if (isset($palabra->abst))
    <h3 class="mt-3">
        Sustantivo abstracto:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->abst) !!}</span>
    </h3>
@endif

@if (isset($palabra->atr))
    <h3 class="mt-3">Forma atributiva:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->atr) !!}</span>
    </h3>
@endif

@if (isset($palabra->inf))
    <h3 class="mt-3">Infinitivo:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->inf) !!}</span>
    </h3>
@endif

@if (isset($palabra->nopos))
    <h3 class="mt-3">Forma no poseída:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->nopos) !!}</span>
    </h3>
@endif

@if (isset($palabra->pl))
    <h3 class="mt-3">Plural:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->pl) !!}</span>
    </h3>
@endif

@if (isset($palabra->plpos))
    <h3 class="mt-3">Plural poseído:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->plpos) !!}</span>
    </h3>
@endif

@if (isset($palabra->pm))
    <h3 class="mt-3">Posesión marcada:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->pm) !!}</span>
    </h3>
@endif

</div>

<br>


<?php
$cadena = $palabra->idsn;
$sn = 1;
$array = explode(';', $cadena);
?>

<ol class="pl-5 mt-2 list-decimal">
    @foreach ($array as $ar)
        @foreach ($sentidos as $sentido)
            @if ($ar == $sentido->id)
                <li id="sn{{ $sn++ }}" class="mt-3">
                    <h4 class="mt-3">
                        @if (isset($sentido->sndial))
                            [<span>{!! preg_replace(
                                '/<a href="(.*?)">(.*?)<\/a>/',
                                '<a href="$1" style="color: #00A7AE;">$2</a>',
                                $sentido->sndial
                            ) !!}</span>]
                        @endif
                        <span class="bg-yellow-500" id="definicion">
                            <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->de) !!}</span>
                        </span>
                    </h4>
                </li>

                <h4 class="mt-3">
                    <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->sc) !!}</span>
                </h4>

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
                                <div class="flex items-center gap-2">
                                    <h4 class="mt-3">
                                        [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xdial) !!}</span>]
                                        <span style="color: #2d7ac6">{!! $exnum->xv !!}</span>
                                        <span style="color: black">{!! $exnum->xe !!}</span>
                                    </h4>
                                    @if (isset($exnum->audio))
                                        @if (strpos($exnum->audio, 'http') === false)
                                            <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                id="player{{ $exnum->id }}" type="audio/mpeg" preload="auto"></audio>

                                            <button onclick="playAudio('{{ $exnum->id }}')"
                                                class="bg-gray-800 p-2 rounded mt-3 ml-2">
                                                <svg class="w-3 h-3 text-white" aria-hidden="true"
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
                                                <svg class="w-3 h-3 text-white" aria-hidden="true"
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
                    <h4 class="mt-3">
                        ∎
                        @if (isset($sentido->sndial))
                            {{-- [<span>{!! preg_replace(
                                '/<a href="(.*?)">(.*?)<\/a>/',
                                '<a href="$1" style="color: #00A7AE;">$2</a>',
                                $sentido->sndial
                            ) !!}</span>] --}}
                        @endif
                        <span class="bg-yellow-200" id="definicion">
                            <span class="text-xl">{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->de2) !!}</span>
                        </span>
                    </h4>

                    <?php
                    $cadenados = $sentido->exnum2;
                    $arraydos = explode(';', $cadenados);
                    ?>

                    @foreach ($arraydos as $ardos)
                        @foreach ($exnums as $exnum)
                            @if (isset($exnum->exnum))
                                @if ($ardos == $exnum->exnum)
                                    <div class="flex items-center gap-2">
                                        <h4 class="mt-3">
                                            [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xdial) !!}</span>]
                                            <span style="color: #2d7ac6">{!! $exnum->xv !!}</span>
                                            <span style="color: black">{!! $exnum->xe !!}</span>
                                        </h4>
                                        @if (isset($exnum->audio))
                                            @if (strpos($exnum->audio, 'http') === false)
                                                <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                    id="player{{ $exnum->id }}" type="audio/mpeg"
                                                    preload="auto"></audio>

                                                <button onclick="playAudio('{{ $exnum->id }}')"
                                                    class="bg-gray-800 p-2 rounded mt-3 ml-2">
                                                    <svg class="w-3 h-3 text-white"
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
                                                    <svg class="w-3 h-3 text-white"
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
                    <h4 class="mt-3">
                        ∎
                        @if (isset($sentido->sndial))
                            {{-- [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->sndial) !!}</span>] --}}
                        @endif
                        <span class="bg-yellow-200" id="definicion">
                            <span class="text-xl">{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->de3) !!}</span>
                        </span>
                    </h4>

                    <?php
                    $cadena3 = $sentido->exnum3;
                    $array3 = explode(';', $cadena3);
                    ?>

                    @foreach ($array3 as $ar3)
                        @foreach ($exnums as $exnum)
                            @if ($ar3 == $exnum->exnum)
                                <div class="flex items-center gap-2">
                                    <h4 class="mt-3">
                                        [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xdial) !!}</span>]
                                        <span style="color: #2d7ac6">{!! $exnum->xv !!}</span>
                                        <span style="color: black"><span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xe) !!}</span></span>
                                    </h4>
                                    @if (isset($exnum->audio))
                                    @if (strpos($exnum->audio, 'http') === false)
                                        <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                            id="player{{ $exnum->id }}" type="audio/mpeg" preload="auto"></audio>

                                        <button onclick="playAudio('{{ $exnum->id }}')"
                                            class="bg-gray-800 p-2 rounded mt-3">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true"
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
                                            <svg class="w-3 h-3 text-white" aria-hidden="true"
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
                        @endforeach
                    @endforeach
                @endif


                @if (isset($sentido->sy))
                    <h4 class="mt-3">Sinónimo(s):
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->sy) !!}</span>
                    </h4>
                @endif
                @if (isset($sentido->sncf))
                    <h4 class="mt-3">Véase:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->sncf) !!}</span>
                    </h4>
                @endif
                @if (isset($sentido->sncfdial))
                    <h4 class="mt-3">Otros lugares:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->sncfdial) !!}</span>
                    </h4>
                @endif
            @endif
        @endforeach
    @endforeach

</ol>


<br>


@if (isset($palabra->cfdial))

    <h4 class="mt-3" id="otros">Otros lugares:</h4>

    <?php
    $cadena4 = $palabra->cfdial;
    $array4 = explode(';', $cadena4);
    ?>

    @foreach ($array4 as $ar4)
        <h4 class="mt-3">∎ <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $ar4) !!}</span></h4>
    @endforeach

@endif


@if (isset($palabra->cf))
    <h4 class="mt-3">Véase:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->cf) !!}</span>
    </h4>
@endif

@if (isset($palabra->phr))
    <h4 class="mt-3">Aparece en la expresión siguiente:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->phr) !!}</span>
    </h4>
@endif

@if (isset($palabra->agn))
    <h4 class="mt-3">Sustantivo de persona (agentivo):
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->agn) !!}</span>
    </h4>
@endif

@if (isset($palabra->dif))
    <h4 class="mt-3">Forma difusiva:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->dif) !!}</span>
    </h4>
@endif

@if (isset($palabra->sp))
    <h4 class="mt-3">
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->sp) !!}</span>
    </h4>
@endif

@if (isset($palabra->alisto))
    <h4 class="mt-3">Más información sobre la variación dialectal de esta forma <a class="text-blue-400" target="_blank" href="{{ $palabra->alisto }}">aquí</a>.</h4>
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
                    <a href="#morinvas-collapsible" class="morinv-toggle mt-10 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Ver
                        Más..
                    </a>
                </div>
            @endif
        </div>
    @endif
@endif
