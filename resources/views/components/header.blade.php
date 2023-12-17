<nav class="bg-gray-800 py-6 relative">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div class="flex flex-grow items-center">
            <h1 class="text-2xl font-semibold text-white"><a href="{{ route('index') }}">DITSEL</a></h1>
        </div>
        <div class="flex lg:hidden">
            <button id="menuToggle"
                class="flex w-full justify-center items-center rounded-md border border-white px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
            </button>
        </div>
        <div id="menu"
            class="lg:flex hidden z-10 flex-grow justify-between absolute lg:relative lg:top-0 top-20 left-0 bg-gray-800 w-full lg:w-auto items-center py-14 lg:py-0 px-8 sm:px-20 lg:px-0">
            <div class="flex flex-col lg:flex-row mb-8 lg:mb-0">
                <a href="{{ route('index') }}" class="text-white lg:mr-7 mb-8 lg:mb-0 md:mr-5 font-medium">Inicio</a>
                <a href="{{ route('donativos') }}"
                    class="text-white lg:mr-7 mb-8 lg:mb-0 md:mr-5 font-medium">Donativos</a>
                <a href="{{ route('antecedentes') }}"
                    class="text-white lg:mr-7 mb-8 lg:mb-0 md:mr-5 font-medium">Antecedentes</a>
                <a href="{{ route('colaboradores') }}"
                    class="text-white lg:mr-7 mb-8 lg:mb-0 md:mr-5 font-medium">Colaboradores</a>
                {{-- <a href="{{ route('referencias') }}"
                    class="text-white lg:mr-7 mb-8 lg:mb-0 md:mr-5 font-medium">Referencias</a> --}}
            </div>
            <div class="flex flex-col lg:flex-row text-center">
                <a
                    class="citar-button hover:cursor-pointer text-white font-bold border border-white py-2.5 px-5 rounded-md hover:bg-white hover:text-gray-800 transition duration-500 ease-in-out lg:mr-4 mb-8 lg:mb-0">
                    Citar
                </a>
            </div>
        </div>
    </div>
</nav>


<div id="myModal" class="modal hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50">
    <div class="modal-dialog m-auto max-w-3xl mt-10">
        <!-- Modal content -->
        <div class="modal-content bg-white p-10 rounded shadow-lg">
            <?php
                date_default_timezone_set('America/New_York'); // Establece la zona horaria que corresponde a tu ubicación

                $date = date('d/m/Y');
            ?> <div class="modal-header">
                <h4 class="modal-title text-lg">Polian, Gilles. 2019. <i>Diccionario tseltal en línea</i>,
                    disponible en <a class="font-semibold" target="_blank"
                        href="http://ditsel.aldelim.org">ditsel.aldelim.org</a>,
                    consultado el {{ $date }}</h4>
            </div>
            <div class="modal-footer mt-3">
                <button id="cerrarModal" class="bg-gray-800 py-1.5 px-3 text-white rounded">Cerrar</button>
            </div>
        </div>
    </div>
</div>
