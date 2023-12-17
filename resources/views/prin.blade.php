<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->gl) !!}</span>

<h3 class="mt-3">
    @if (isset($palabra->lxdial))
        Se usa en:
        <span style="color: #3dd053;">{!! $dic->lxdial !!}</span>

    @endif
    @if (isset($palabra->cfdial))
        ( <span style="color: #306A1B">véase</span> → <a href="#otros">Otros lugares</a>)
    @endif
</h3>


@if (isset($palabra->mor))
    <h3 class="mt-3">
        Morfología:
        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->mor) !!}</span>
        @if (isset($palabra->morcom))
            (<span>{!! preg_replace(
                '/<a href="(.*?)">(.*?)<\/a>/',
                '<a href="$1" style="color: #00A7AE;">$2</a>',
                $palabra->morcom
            ) !!}</span>)
        @endif
    </h3>
@endif


@foreach ($dics as $dic)
    @if (rtrim($palabra->prin) == rtrim($dic->lxid))

        <h3 class="mt-3">Variante de:</h3>
        <h2 class="text-blue-500 mt-5">
            <b class="text-2xl">{!! $dic->lx !!}</b>
            <span class="text-gray-500">
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->hm) !!}</span>
                @if (isset($dic->phon))
                    [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->phon) !!}</span>]
                @endif <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->sec) !!}</span>
            </span>


            @if (isset($dic->audio))
                @if (strpos($dic->audio, 'http') === false)
                    <audio src="{{ asset('audios/' . $dic->audio) }}" id="player{{ $dic->id }}" type="audio/mpeg"
                        preload="auto"></audio>

                    <button onclick="playAudio('{{ $dic->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                        <svg class="w-3 h-3 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                            <path
                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                        </svg>
                    </button>
                @else
                    <audio src="{{ asset('audios/' . $dic->audio) }}" id="player{{ $dic->id }}" type="audio/mpeg"
                        preload="auto"></audio>

                    <button onclick="playAudio('{{ $dic->id }}')" class="bg-gray-800 p-2 rounded mt-3">
                        <svg class="w-3 h-3 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                            <path
                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                        </svg>
                    </button>
                @endif
            @endif

        </h2>

        <div class="bg-gray-300 p-7 mt-3 mb-3 rounded">
            <h3 class="mt-3">
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->predva) !!}</span>
                @if (isset($dic->va))
                    <h4 class="mt-3">
                        Variación impredecible:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->va) !!}</span>
                    </h4>
                @endif

                <h4 class="mt-3">
                    <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->psext) !!}</span>
                </h4>


                <h4 class="mt-3">
                    @if (isset($dic->lxdial))
                        Se usa en:
                        <span style="color: #3dd053;">{!! $dic->lxdial !!}</span>
                    @endif
                    @if (isset($dic->cfdial))
                        ( <span style="color: #306A1B">véase</span> → <a href="#otros">Otros lugares</a>)
                    @endif
                </h4>


                @if (isset($dic->mor))
                    <h4 class="mt-3">Morfología:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->mor) !!}</span>
                        @if (isset($dic->morcom))
                            (<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->morcom) !!}</span>)
                        @endif
                    </h4>
                @endif



                @if (isset($dic->et))
                    <h4 class="mt-3">
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $palabra->et) !!}</span>
                        {{-- RARO $palabra->et --}}
                    </h4>
                @endif

                @if (isset($dic->abst))
                    <h4 class="mt-3">Sustantivo abstracto:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->abst) !!}</span>
                    </h4>
                @endif

                @if (isset($dic->atr))
                    <h4 class="mt-3">Forma atributiva:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->atr) !!}</span>
                    </h4>
                @endif

                @if (isset($dic->inf))
                    <h4 class="mt-3">Infinitivo:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->inf) !!}</span>
                    </h4>
                @endif

                @if (isset($dic->nopos))
                    <h4 class="mt-3">Forma no poseída:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->nopos) !!}</span>
                    </h4>
                @endif

                @if (isset($dic->pl))
                    <h4 class="mt-3">Plural:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->pl) !!}</span>
                    </h4>
                @endif

                @if (isset($dic->plpos))
                    <h4 class="mt-3">Plural poseído:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->plpos) !!}</span>
                    </h4>
                @endif

                @if (isset($dic->pm))
                    <h4 class="mt-3">Posesión marcada:
                        <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->pm) !!}</span>
                    </h4>
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
                            <h4 class="mt-3">

                                @if (isset($sentido->sndial))
                                    <span>{!! preg_replace(
                                        '/<a href="(.*?)">(.*?)<\/a>/',
                                        '<a href="$1" style="color: #00A7AE;">$2</a>',
                                        $sentido->sndial,
                                    ) !!}</span>
                                @endif
                                <span class="bg-yellow-400" id="definicion">
                                    <span class="text-xl">{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->de) !!}</span>
                                </span>
                            </h4>
                        </li>

                        <h4 class="mt-3">{!! $sentido->sc !!}</h4>

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
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="auto"></audio>

                                                    <button onclick="playAudio('{{ $exnum->id }}')"
                                                        class="bg-gray-800 p-2 rounded mt-3">
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
                                                        class="bg-gray-800 p-2 rounded mt-3">
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

                        @if (isset($sentido->de2))
                            <h4 class="mt-3">

                                ∎
                                @if (isset($sentido->sndial))
                                    {{-- [<span>{!! preg_replace(
                                        '/<a href="(.*?)">(.*?)<\/a>/',
                                        '<a href="$1" style="color: #00A7AE;">$2</a>',
                                        $sentido->sndial,
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
                                                    <span class="text-blue-400">{!! $exnum->xv !!}</span>
                                                    <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xe) !!}</span>
                                                </h4>
                                                @if (isset($exnum->audio))
                                                    @if (strpos($exnum->audio, 'http') === false)
                                                        <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                            id="player{{ $exnum->id }}" type="audio/mpeg"
                                                            preload="auto"></audio>

                                                        <button onclick="playAudio('{{ $exnum->id }}')"
                                                            class="bg-gray-800 p-2 rounded mt-3">
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
                                                            class="bg-gray-800 p-2 rounded mt-3">
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
                                    {{-- [<span>{!! preg_replace(
                                        '/<a href="(.*?)">(.*?)<\/a>/',
                                        '<a href="$1" style="color: #00A7AE;">$2</a>',
                                        $sentido->sndial,
                                    ) !!}</span>] --}}
                                @endif
                                <span class="bbg-yellow-600" id="definicion">
                                    <span class="text-xl">{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $sentido->de3) !!}</span>
                                </span>
                            </h4>

                            <?php
                            $cadena3 = $sentido->exnum3;
                            $array3 = explode(';', $cadena3);
                            ?>




                            @foreach ($array3 as $ar3)
                                @foreach ($exnums as $exnum)
                                    <div class="flex items-center gap-2">
                                        <h4 class="mt-3">
                                            [<span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xdial) !!}</span>]
                                            <span class="text-blue-400">{!! $exnum->xv !!}</span>
                                            <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $exnum->xe) !!}</span>
                                        </h4>
                                        @if ($ar3 == $exnum->exnum)
                                            @if (isset($exnum->audio))
                                                @if (strpos($exnum->audio, 'http') === false)
                                                    <audio src="{{ asset('audios/' . $exnum->audio) }}"
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="auto"></audio>

                                                    <button onclick="playAudio('{{ $exnum->id }}')"
                                                        class="bg-gray-800 p-2 rounded mt-3">
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
                                                        class="bg-gray-800 p-2 rounded mt-3">
                                                        <svg class="w-3 h-3 text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 14 16">
                                                            <path
                                                                d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                            @endif
                                        @endif
                                    </div>



                                    {{-- @endif --}}
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
                                <span>{!! preg_replace(
                                    '/<a href="(.*?)">(.*?)<\/a>/',
                                    '<a href="$1" style="color: #00A7AE;">$2</a>',
                                    $sentido->sncfdial
                                ) !!}</span>
                            </h4>
                        @endif
                    @endif
                @endforeach
            @endforeach

        </ol>


        <br>


        @if (isset($dic->cfdial))
            <h4 class="mt-3" id="otros">Otros lugares:</h4>

            <?php
            $cadena4 = $dic->cfdial;
            $array4 = explode(';', $cadena4);
            ?>

            @foreach ($array4 as $ar4)
                <h4 class="mt-3">∎ <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $ar4) !!}</span></h4>
            @endforeach
        @endif


        @if (isset($dic->cf))
            <h4 class="mt-3">Véase:
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->cf) !!}</span>
            </h4>
        @endif

        @if (isset($dic->phr))
            <h4 class="mt-3">Aparece en la expresión siguiente:
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->phr) !!}</span>
            </h4>
        @endif

        @if (isset($dic->agn))
            <h4 class="mt-3">Sustantivo de persona (agentivo):
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->agn) !!}</span>
            </h4>
        @endif

        @if (isset($dic->dif))
            <h4 class="mt-3">Forma difusiva:
                <span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->dif) !!}</span>
            </h4>
        @endif

        @if (isset($dic->sp))
            <h4 class="mt-3"><span>{!! preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1" style="color: #00A7AE;">$2</a>', $dic->sp) !!}</span></h4>
        @endif

        @if (isset($dic->alisto))
            <h4 class="mt-3">Más información sobre la variación dialectal de esta forma <a target="_blank"
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
                                class="morinv-toggle mt-10 bg-gray-300 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Ver
                                Más...</a>
                        </div>
                    @endif
                </div>
            @endif
        @endif
    @endif
@endforeach
