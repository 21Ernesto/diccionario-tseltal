<?php

namespace App\Http\Controllers;

use App\Models\Abecedario;
use App\Models\Donativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DonativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abecedario = Abecedario::all();
        $donativo = Donativo::all();
        return view('donativos', ['abecedario' => $abecedario, 'donativo' => $donativo]);

    }

    public function donativos()
    {
        $donativos = Donativo::paginate(10);
        return view('admin.donativos', ['donativos' => $donativos]);
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

            if (!empty($lineas)) {

                $nombre = array_shift($lineas);
                $nombre = substr($nombre, 8);
                $nombre = rtrim($nombre);
                $fila['nombre'] = $nombre;

            }
            $datos[] = $fila;
        }

        Donativo::truncate();

        foreach ($datos as $fila) {
            $referencias = new Donativo();
            $referencias->nombre = $fila['nombre'];
            $referencias->save();
        }

        session()->flash('mensaje', '¡La información se ha guardado correctamente!');

        return redirect()->route('admin.donativos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donativo $donativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donativo $donativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donativo $donativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donativo $donativo)
    {
        //
    }
}
