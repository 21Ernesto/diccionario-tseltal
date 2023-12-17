<?php

namespace App\Http\Controllers;

use App\Models\Sentido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SentidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sentido = Sentido::paginate(10);
        return view('admin.sentido', ['sentido' => $sentido]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function import(Request $request)
    {
        $contenido = File::get($request->file('file'));
        $contenido = preg_replace('/^\s*$/m', '', $contenido);
        $piezas = explode("\n\n", $contenido);
        $datos = [];

        foreach ($piezas as $parte) {
            $lineas = explode("\n", $parte);
            $fila = [];
            foreach ($lineas as $linea) {
                if (strpos($linea, '\idsn ') === 0) {
                    $fila['idsn'] = trim(substr($linea, 6));
                } elseif (strpos($linea, '\sndial ') === 0) {
                    $fila['sndial'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\de1 ') === 0) {
                    $fila['de'] = trim(substr($linea, 5));
                } elseif (strpos($linea, '\pc ') === 0) {
                    $fila['pc'] = trim(substr($linea, 4));
                } elseif (strpos($linea, '\pc1 ') === 0) {
                    $fila['pc1'] = trim(substr($linea, 5));
                } elseif (strpos($linea, '\pc2 ') === 0) {
                    $fila['pc2'] = trim(substr($linea, 5));
                } elseif (strpos($linea, '\pc3 ') === 0) {
                    $fila['pc3'] = trim(substr($linea, 5));
                } elseif ((strpos($linea, '\sc ')) === 0) {
                    $fila['sc'] = trim(substr($linea, 4));
                } elseif (strpos($linea, '\exnum ') === 0) {
                    $fila['exnum'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\de2 ') === 0) {
                    $fila['de2'] = trim(substr($linea, 5));
                } elseif (strpos($linea, '\exnum2 ') === 0) {
                    $fila['exnum2'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\de3 ') === 0) {
                    $fila['de3'] = trim(substr($linea, 5));
                } elseif (strpos($linea, '\exnum3 ') === 0) {
                    $fila['exnum3'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\sy ') === 0) {
                    $fila['sy'] = trim(substr($linea, 4));
                } elseif (strpos($linea, '\sncf ') === 0) {
                    $fila['sncf'] = trim(substr($linea, 6));
                } elseif (strpos($linea, '\sncfdial ') === 0) {
                    $fila['sncfdial'] = trim(substr($linea, 10));
                }
            }
            $datos[] = $fila;
        }

        Sentido::truncate();

        foreach ($datos as $fila) {
            $sentido = new Sentido();
            $sentido->fill($fila);
            $sentido->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');

        return redirect()->route('sentido');
    }


    /**
     * Display the specified resource.
     */
    public function show(Sentido $sentido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sentido $sentido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sentido $sentido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sentido $sentido)
    {
        //
    }
}
