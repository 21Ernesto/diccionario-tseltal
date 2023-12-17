<div class="antialiased bg-gray-50 bg-gray-100">

    {{-- NAVEGACIÓN --}}
    <nav class="px-4 py-4 bg-gray-800 border-gray-700 fixed left-0 right-0 top-0 z-50">
        <div class="flex flex-wrap justify-between items-center">

            {{-- BOTON AMBURGUESA --}}
            <div class="flex justify-start items-center">
                <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                    aria-controls="drawer-navigation"
                    class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 focus:ring-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex items-center justify-between mr-4">
                    <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="Tseltal Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Tseltal</span>
                </a>
            </div>

            {{-- MENU PERFIL --}}
            <div class="flex items-center lg:order-2">
                <button type="button"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <svg class="w-[25px] h-[25px] text-gray-800 text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-gray-800 rounded divide-y divide-gray-100 shadow bg-gray-700 divide-gray-600" id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-800 text-white">{{ Auth::user()->name }}</span>
                        <span class="block text-sm text-gray-800 truncate text-white">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-1 text-gray-700 text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 hover:bg-gray-600 hover:text-white">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full border-r md:translate-x-0 bg-gray-800 border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-800 rounded-lg text-white hover:bg-gray-100 hover:bg-gray-700 group">
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-white transition duration-75 text-gray-400 group-hover:text-gray-800 group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.inicio') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Inicio</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('abecedario') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 17V1m0 0L1 4m3-3 3 3m4-3h6l-6 6h6m-7 10 3.5-7 3.5 7m-6.125-2H16" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Abecedario</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dicc') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Diccionario</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('exnums') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none"
                            viewBox="0 0 20 14">
                            <path stroke="currentColor" stroke-width="2"
                                d="M1 5h18M1 9h18m-9-4v8m-8 0h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Exmuns</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('sentido') }}" type="button"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M11 16.5A2.493 2.493 0 0 1 6.51 18H6.5a2.468 2.468 0 0 1-2.4-3.154 2.98 2.98 0 0 1-.85-5.274 2.468 2.468 0 0 1 .921-3.182 2.477 2.477 0 0 1 1.875-3.344 2.5 2.5 0 0 1 3.41-1.856A2.5 2.5 0 0 1 11 3.5m0 13v-13m0 13a2.492 2.492 0 0 0 4.49 1.5h.01a2.467 2.467 0 0 0 2.403-3.154 2.98 2.98 0 0 0 .847-5.274 2.468 2.468 0 0 0-.921-3.182 2.479 2.479 0 0 0-1.875-3.344A2.5 2.5 0 0 0 13.5 1 2.5 2.5 0 0 0 11 3.5m-8 5a2.5 2.5 0 0 1 3.48-2.3m-.28 8.551a3 3 0 0 1-2.953-5.185M19 8.5a2.5 2.5 0 0 0-3.481-2.3m.28 8.551a3 3 0 0 0 2.954-5.185" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Sentidos</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('audio') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7v3a5.006 5.006 0 0 1-5 5H6a5.006 5.006 0 0 1-5-5V7m7 9v3m-3 0h6M7 1h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Z"/>
                          </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Audios</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('imagen') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path fill="currentColor"
                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Imagenes</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.donativos') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2M5 5h8m-8 5h8m-8 4h8" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Donativos</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.colaboradores') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Colaboradores</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.biologos') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Biologos</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('referencia') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h6m-6 4h6m-6 4h6M1 1v18l2-2 2 2 2-2 2 2 2-2 2 2V1l-2 2-2-2-2 2-2-2-2 2-2-2Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Referencias</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.antecedentes') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-800 rounded-lg transition duration-75 group hover:bg-gray-100 text-white hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M19.472 9.541a.5.5 0 0 0-.982-.1 1.308 1.308 0 0 1-1.258.96 1.394 1.394 0 0 1-1.329-.959.5.5 0 0 0-.965 0 1.394 1.394 0 0 1-2.6.136l-.046-.194.02-.139V7.5H14.5A2.5 2.5 0 0 0 17 5a2.544 2.544 0 0 0-2.521-2.5l-.5.021-.124-.351A2.5 2.5 0 0 0 11.5.5c-.439 0-.87.118-1.248.34L10 .987 9.748.84A2.472 2.472 0 0 0 8.5.5a2.5 2.5 0 0 0-2.358 1.671l-.124.351-.492-.022A2.547 2.547 0 0 0 3 5a2.5 2.5 0 0 0 2.5 2.5h2.229v1.793l-.007.085-.026.077a1.26 1.26 0 0 1-1.236.945 1.55 1.55 0 0 1-1.427-.972.5.5 0 0 0-.959.012 1.4 1.4 0 0 1-1.334.96 1.312 1.312 0 0 1-1.259-.96.52.52 0 0 0-.54-.363H.933a.5.5 0 0 0-.433.5V10a9.511 9.511 0 0 0 9.5 9.5 9.41 9.41 0 0 0 6.713-2.793 9.518 9.518 0 0 0 2.786-6.74l-.027-.426ZM6.5 13.5a1 1 0 1 1 2 0 1 1 0 0 1-2 0ZM8 17a2 2 0 0 1 4 0H8Zm4.5-2.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Antecedestes</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
</div>
