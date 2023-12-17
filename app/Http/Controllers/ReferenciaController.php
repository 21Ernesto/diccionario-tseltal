<?php

namespace App\Http\Controllers;

use App\Models\Referencia;
use App\Http\Requests\StoreReferenciaRequest;
use App\Http\Requests\UpdateReferenciaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Abecedario;
use App\Models\Biologos;

class ReferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abecedario = Abecedario::all();
        $referencia = Referencia::all();
        return view('referencias')->with(['abecedario' => $abecedario, 'referencia' => $referencia]);

    }


    public function referencia()
    {
        $referencia = Referencia::paginate(10);
        return view('admin.referencias', ['referencia' => $referencia]);
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
    public function store(StoreReferenciaRequest $request)
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
                if (strpos($linea, '\refid ') === 0) {
                    $fila['refid'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\author ') === 0) {
                    $fila['author'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\year ') === 0) {
                    $fila['year'] = trim(substr($linea, 6));
                } elseif (strpos($linea, '\title ') === 0) {
                    $fila['title'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\pub ') === 0) {
                    $fila['pub'] = trim(substr($linea, 5));
                } elseif (strpos($linea, '\nt ') === 0) {
                    $fila['nt'] = trim(substr($linea, 4));
                }
            }
            $datos[] = $fila;
        }
        Referencia::truncate();
        foreach ($datos as $fila) {
            $sentido = new Referencia();
            $sentido->fill($fila);
            $sentido->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');
        return redirect()->route('referencia');
    }

    /**
     * Display the specified resource.
     */
    public function show(Referencia $referencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referencia $referencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReferenciaRequest $request, Referencia $referencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referencia $referencia)
    {
        //
    }
}
