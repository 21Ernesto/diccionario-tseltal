<?php

namespace App\Http\Controllers;

use App\Models\Biologos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBiologosRequest;
use App\Http\Requests\UpdateBiologosRequest;

class BiologosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biologos = Biologos::paginate(10);
        return view('admin.biologos', ['biologos' => $biologos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
                if (strpos($linea, '\cargo ') === 0) {
                    $fila['cargo'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\nombre ') === 0) {
                    $fila['nombre'] = trim(substr($linea, 8));
                }
            }
            $datos[] = $fila;
        }
        Biologos::truncate();
        foreach ($datos as $fila) {
            $sentido = new Biologos();
            $sentido->fill($fila);
            $sentido->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');
        return redirect()->route('admin.biologos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBiologosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Biologos $biologos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biologos $biologos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBiologosRequest $request, Biologos $biologos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biologos $biologos)
    {
        //
    }
}
