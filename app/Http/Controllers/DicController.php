<?php

namespace App\Http\Controllers;

use App\Models\Dic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diccionario = Dic::paginate(10);
        return view('admin.dicc', ['diccionario' => $diccionario]);
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
        $partes = explode("\n\n", $contenido);
        $datos = [];
        foreach ($partes as $parte) {
            $lineas = explode("\n", $parte);
            $fila = [];
            foreach ($lineas as $linea) {
                if (strpos($linea, '\lxid-1 ') === 0) {
                    $fila['lxid'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\lx-2 ') === 0) {
                    $fila['lx'] = trim(substr($linea, 6));
                } elseif (strpos($linea, '\hm-4 ') === 0) {
                    $fila['hm'] = trim(substr($linea, 6));
                } elseif (strpos($linea, '\lxalt-35 ') === 0) {
                    $fila['lxalt'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\phon-5 ') === 0) {
                    $fila['phon'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\sec-6 ') === 0) {
                    $fila['sec'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\predva-7 ') === 0) {
                    $fila['predva'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\lxdial-8 ') === 0) {
                    $fila['lxdial'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\var-9 ') === 0) {
                    $fila['va'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\ps-11 ') === 0) {
                    $fila['ps'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\et-12 ') === 0) {
                    $fila['et'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\atr-13 ') === 0) {
                    $fila['atr'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\abst-14 ') === 0) {
                    $fila['abst'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\inf-15 ') === 0) {
                    $fila['inf'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\nopos-16 ') === 0) {
                    $fila['nopos'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\pl-17 ') === 0) {
                    $fila['pl'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\plpos-18 ') === 0) {
                    $fila['plpos'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\pm-19 ') === 0) {
                    $fila['pm'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\idsn-20 ') === 0) {
                    $fila['idsn'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\cf-21 ') === 0) {
                    $fila['cf'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\cfdial-22 ') === 0) {
                    $fila['cfdial'] = trim(substr($linea, 11));
                } elseif (strpos($linea, '\agn-23 ') === 0) {
                    $fila['agn'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\dif-24 ') === 0) {
                    $fila['dif'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\sp-25 ') === 0) {
                    $fila['sp'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\phr-26 ') === 0) {
                    $fila['phr'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\mor-27 ') === 0) {
                    $fila['mor'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\morcom-28 ') === 0) {
                    $fila['morcom'] = trim(substr($linea, 11));
                } elseif (strpos($linea, '\audio-29 ') === 0) {
                    $fila['audio'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\alisto-30 ') === 0) {
                    $fila['alisto'] = trim(substr($linea, 11));
                } elseif (strpos($linea, '\prin-31 ') === 0) {
                    $fila['prin'] = trim(substr($linea, 9));
                } elseif (strpos($linea, '\ly-3 ') === 0) {
                    $fila['ly'] = trim(substr($linea, 6));
                }elseif (strpos($linea, '\min-33 ') === 0) {
                    $fila['min'] = trim(substr($linea, 8));
                } elseif (strpos($linea, '\m_multiple ') === 0) {
                    $fila['m_multiple'] = trim(substr($linea, 12));
                }elseif (strpos($linea, '\morinv-32 ') === 0) {
                    $fila['morinv'] = trim(substr($linea, 11));
                } elseif (strpos($linea, '\gl-34 ') === 0) {
                    $fila['gl'] = trim(substr($linea, 7));
                } elseif (strpos($linea, '\psext-10 ') === 0) {
                    $fila['psext'] = trim(substr($linea, 10));
                } elseif (strpos($linea, '\inv-35 ') === 0) {
                    $fila['inv'] = trim(substr($linea, 8));
                }
            }
            $datos[] = $fila;
        }
        Dic::truncate();
        foreach ($datos as $data) {
            $dic = new Dic();
            $dic->fill($data);
            $dic->save();
        }
        session()->flash('mensaje', '¡La información se ha guardado correctamente!');

        return redirect()->route('dicc');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dic $dic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dic $dic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dic $dic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dic $dic)
    {
        //
    }
}
