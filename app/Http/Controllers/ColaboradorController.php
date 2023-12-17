<?php

namespace App\Http\Controllers;

use App\Models\Abecedario;
use App\Models\Biologos;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abecedario = Abecedario::all();
        $colaborador = Colaborador::all();
        $biologos = Biologos::all();
        return view('colaboradores')->with(['abecedario' => $abecedario, 'colaborador' => $colaborador,'biologos' => $biologos]);
    }

    public function colaboradores()
    {
        $colaboradores = Colaborador::paginate(10);
        return view('admin.colaboradores', ['colaboradores' => $colaboradores]);
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
                if (strpos($linea, '\nombre ') === 0) {
                    $fila['nombre'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\referencia ') === 0) {
                    $fila['referencia'] = trim(substr($linea, 12));
                }
            }
            $datos[] = $fila;
        }
        Colaborador::truncate();
        foreach ($datos as $fila) {
            $colaboradores = new Colaborador();
            $colaboradores->fill($fila);
            $colaboradores->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');
        return redirect()->route('admin.colaboradores');
    }


    /**
     * Display the specified resource.
     */
    public function show(Colaborador $colaborador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colaborador $colaborador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaborador $colaborador)
    {
        //
    }
}
