<?php

namespace App\Http\Controllers;

use App\Models\Exnums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExnumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exnums = Exnums::paginate(10);
        return view('admin.exnum', ['exnums' => $exnums]);
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
                if (strpos($linea, '\exnum ') === 0) {
                    $fila['exnum'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\xv ') === 0) {
                    $fila['xv'] = trim(substr($linea, 4));
                } elseif (strpos($linea, '\xdial ') === 0) {
                    $fila['xdial'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\xe ') === 0) {
                    $fila['xe'] = trim(substr($linea, 4));
                }elseif (strpos($linea, '\audio ') === 0) {
                    $fila['audio'] = trim(substr($linea, 7));
                }
            }
            $datos[] = $fila;
        }
        Exnums::truncate();
        foreach ($datos as $fila) {
            $sentido = new Exnums();
            $sentido->fill($fila);
            $sentido->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');
        return redirect()->route('exnums');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exnums $exnums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exnums $exnums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exnums $exnums)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exnums $exnums)
    {
        //
    }
}
