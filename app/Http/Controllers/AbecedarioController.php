<?php

namespace App\Http\Controllers;

use App\Models\Abecedario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AbecedarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $abecedario = Abecedario::all();
        $abecedario = Abecedario::paginate(10);
        return view('admin.abecedario', ['abecedario' => $abecedario]);
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
                if (strpos($linea, '\letra ') === 0) {
                    $fila['letra'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\comilla ') === 0) {
                    $fila['comilla'] = trim(substr($linea, 9));
                }
            }
            $datos[] = $fila;
        }
        Abecedario::truncate();
        foreach ($datos as $fila) {
            $sentido = new Abecedario();
            $sentido->fill($fila);
            $sentido->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');
        return redirect()->route('abecedario');
    }


    /**
     * Display the specified resource.
     */
    public function show(Abecedario $abecedario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abecedario $abecedario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abecedario $abecedario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abecedario $abecedario)
    {
        //
    }
}
