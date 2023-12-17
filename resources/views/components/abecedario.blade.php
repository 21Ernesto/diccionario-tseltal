<div class="bg-gray-800 pt-5 pb-5 border-t-2 border-white">
    <div class="container mx-auto flex flex-wrap justify-center">

        @forelse($abecedario as $item)
            <a type="button" href="{{ route('abecedarioSelecionada', $item->letra) }}"
                class="lg:px-4 lg:py-3 lg:text-xl font-medium text-gray-900 border border-gray-200 hover:bg-gray-600 hover:text-blue-700
                   px-2 py-1 text-sm md:text-base lg:text-xl">
                {{ $item->letra }}
            </a>
        @empty
            <!-- Si no hay elementos en el bucle, puedes mostrar un mensaje de "vacío" aquí -->
        @endforelse
    </div>
    <div class="container mx-auto w-max">
        @include('components.search')
    </div>

</div>
