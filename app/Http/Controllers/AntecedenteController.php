<?php

namespace App\Http\Controllers;

use App\Models\Abecedario;
use App\Models\Antecedente;
use Illuminate\Http\Request;

class AntecedenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abecedario = Abecedario::all();
        $antecedentes = Antecedente::first();
        return view('antecedentes', compact('antecedentes', 'abecedario'));
    }


    public function antecedentes()
    {
        $antecedentes = Antecedente::first();
        return view('admin.antecedentes', compact('antecedentes'));
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
        $request->validate([
            'contenido' => 'required|string',
        ]);

        $contenido = $request->input('contenido');

        $antecedente = Antecedente::first();

        if ($antecedente) {
            $antecedente->update(['contenido' => $contenido]);
        } else {
            Antecedente::create(['contenido' => $contenido]);
        }

        session()->flash('mensaje', '¡La información se ha guardado correctamente!');

        return redirect()->route('admin.antecedentes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Antecedente $antecedente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antecedente $antecedente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Antecedente $antecedente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antecedente $antecedente)
    {
        //
    }
}
