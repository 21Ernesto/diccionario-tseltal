<div class="container mt-5 lg:mb-0 -mb-6 w-max lg:flex">
    <div class="flex">
        <div class="relative md:w-96">
            <input type="text" name="lx" id="lx" data-url="{{ route('tseltal_fetch') }}"
                class="block w-full rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Buscar por tseltal" oninput="sanitizeInput(this)">

            <!-- Agregar el div de lxList aquí dentro -->
            <div id="lxList"
                class="absolute hidden mt-2 py-2 px-4 bg-white border border-gray-300 rounded shadow-md w-full md:w-96 right-0 max-h-72 md:max-h-96 lg:max-h-96 overflow-y-auto z-10">
            </div>
        </div>



        <div class="flex items-center ms-3">
            <a id="botonBusquedaTseltal"
                class="hover:cursor-pointer bg-gray-800 text-white font-bold border border-white py-1 px-5 rounded-md hover:bg-white hover:text-gray-800 transition duration-500 ease-in-out lg:mr-4 mb-8 lg:mb-0 relative flex items-center min-w-16">
                <span class="hidden lg:inline-block">Buscar</span>
                <span class="lg:hidden right-0 flex items-center ">
                    <svg class="w-4 h-4 text-white m-1 hover:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </span>
            </a>



        </div>
    </div>
    <div class="flex">
        <div class="relative rounded-md shadow-sm md:w-96">
            <input type="text" name="min" id="min" data-url="{{ route('espanol_fetch') }}"
                class="block w-full rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Buscar por español">

            <!-- Agregar el div de minList aquí dentro -->
            <div id="minList"
                class="absolute hidden mt-2 py-2 px-4 bg-white border border-gray-300 rounded shadow-md w-full md:w-96 right-0 max-h-72 md:max-h-96 lg:max-h-96 overflow-y-auto z-10">
            </div>
        </div>



        <div class="flex items-center ms-3">
            <a id="botonBusquedaSpaniol"
                class="hover:cursor-pointer bg-gray-800 text-white font-bold border border-white py-1 px-5 rounded-md hover:bg-white hover:text-gray-800 transition duration-500 ease-in-out lg:mr-4 mb-8 lg:mb-0 relative flex items-center min-w-16">
                <span class="hidden lg:inline-block">Buscar</span>
                <span class="lg:hidden right-0 flex items-center ">
                    <svg class="w-4 h-4 text-white m-1 hover:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
    {{ csrf_field() }}
</div>
