@extends('layouts.app')

@section('main')
    <div class="container mx-auto px-8 xl:px-0 text-center text-gray-800 mb-3 mt-3">
        <h1 class="lg:text-6xl text-4xl font-semibold pb-4">DONATIVOS</h1>
        <h2 class="lg:text-3xl text-2xl font-medium pb-2">Campaña solidaria de donativos</h2>
        <div class="descripcion text-1xl">
            La conversión de libro impreso a diccionario electrónico fue posible gracias a una campaña de donativos que se realizó del 31 de mayo al 19 de agosto del 2019. Esta campaña se llamó <a href="https://www.goteo.org/project/un-diccionario-en-linea-para-el-idioma-maya-tselta" class="font-semibold">"Un diccionario en línea para el idioma maya tseltal"</a>, a través de la plataforma de la Fundación Goteo. Se juntaron de esta forma € 5,382 euros (aproximativamente 110,000 pesos mexicanos) por parte de 81 donadores. Esta cantidad es la que permitió el lanzamiento del portal del DiTseL.
        </div>

        <div class="donantes mt-9 mb-9 border rounded border-gray-800">
            <div class="donante-listado text-start ps-6 mt-5 mb-5 lg:columns-4 columns-2">

                @forelse($donativo as $item)
                    <p>- {{ $item->nombre }}</p>
                @empty
                    <p>No hay datos que mostrar</p>
                @endforelse
            </div>

        </div>

        <div class="agradecimiento-personas mt-5 mb-8">
            <h1 class="pb-3 font-semibold">Agradecemos también a las personas que han ayudado en la preparación de la campaña:</h1>
            <p><span>Rosaluz Pérez Espinosa</span></p>
            <p><span>Cecilia Monroy</span></p>
            <p><span>Sylvie Lapointe</span></p>
            <p><span>Natalia Arcos Salvo</span></p>
            <p><span>Alessandro Zagato</span></p>
        </div>
    </div>
@endsection
