<?php

namespace App\Http\Controllers;

use App\Models\Abecedario;
use App\Models\Dic;
use App\Models\Exnums;
use App\Models\Home;
use App\Models\Referencia;
use App\Models\Sentido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abecedario = Abecedario::all();
        $home = Home::first();
        return view('index', compact('abecedario', 'home'));
    }

    public function inicio()
    {
        $home = Home::first();
        return view('admin.inicio', compact('home'));
    }

    // public function abecedario($letra)
    // {
    //     $abecedario = Abecedario::all();
    //     $dics = collect();
    //     $comillaValor = Abecedario::where('letra', $letra)->value('comilla');
    //     if ($comillaValor) {
    //         $dics = Dic::where('lx', 'LIKE', $letra . '%')
    //             ->orderBy('lx', 'ASC')
    //             ->orderBy('hm', 'ASC')
    //             ->get();
    //     } else {
    //         $concatenated = $letra . $comillaValor;
    //         $dics = Dic::where('lx', 'LIKE', $concatenated . '%')
    //             ->where('lx', 'NOT LIKE', "%'%")
    //             ->orderBy('lx', 'ASC')
    //             ->orderBy('hm', 'ASC')
    //             ->get();
    //     }

    //     return view('abecede', compact('palabras', 'abecedario'));
    // }


    // public function abecedario($letra)
    // {
    //     $abecedario = Abecedario::all();
    //     $dics = Dic::orderBy('ly', 'ASC')->orderBy('hm', 'ASC')->get();
    //     foreach ($dics as $dic) {
    //         $pos = strpos($dic->lx, $letra);
    //         if ($pos === false) {
    //         } else {
    //             if ($pos == 0) {
    //                 $coleccion[] = $dic;
    //             }
    //         }
    //     }
    //     $collection = collect($coleccion);
    //     $palabras = $collection->sortBy('ly');

    //     return view('abecede', compact('palabras', 'abecedario'));
    // }


    public function abecedario($letra)
    {
        $abecedario = Abecedario::all();
        $dics = collect();
        $comillaValor = Abecedario::where('letra', $letra)->value('comilla');

        if ($comillaValor) {
            $dics = Dic::where('lx', 'LIKE', $letra . '%')
                ->orderBy('lx', 'ASC')
                ->orderBy('hm', 'ASC')
                ->get();
        } else {
            $concatenated = $letra . $comillaValor;
            $dics = Dic::where('lx', 'LIKE', $concatenated . '%')
                ->where('lx', 'NOT LIKE', "%'%")
                ->orderBy('lx', 'ASC')
                ->orderBy('hm', 'ASC')
                ->get();
        }
        $coleccion = [];
        foreach ($dics as $dic) {
            if ($dic) {
                $coleccion[] = $dic;
            }
        }
        $collection = collect($coleccion)->sortBy('ly');
        $palabras = $collection->values()->all();

        return view('abecede', compact('palabras', 'abecedario'));
    }


    function tseltal_fetch(Request $request)
    {
        if ($request->has('query')) {
            $query = trim($request->input('query'));
            $query = str_replace('*', '%', $query);
            if (strpos($query, '%') === 0) {
                $data = DB::table('dics')
                    ->where('lx', 'like', '%' . substr($query, 1))
                    ->orderBy('lx', 'ASC')
                    ->orderBy('hm', 'ASC')
                    ->get();
            } elseif (strrpos($query, '%') === strlen($query) - 1) {
                $data = DB::table('dics')
                    ->where('lx', 'like', substr($query, 0, -1) . '%')
                    ->orderBy('lx', 'ASC')
                    ->orderBy('hm', 'ASC')
                    ->get();
            } else {
                $data = DB::table('dics')
                ->where('lx', 'like', $query . '%')
                ->orWhereRaw("FIND_IN_SET(?, REPLACE(lxalt, '; ', ','))", [$query])
                ->orderBy('lx', 'ASC')
                ->orderBy('hm', 'ASC')
                ->get();

            }

            $coleccion = [];
            foreach ($data as $dat) {
                if ($dat) {
                    $coleccion[] = $dat;
                }
            }

            $collection = collect($coleccion)->sortBy('ly');
            $palabras = $collection->values()->all();

            $output = '';
            if (!empty($palabras)) {
                $output .= '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';

                foreach ($palabras as $row) {
                    $output .= '<li><a class="dropdown-item hover:font-semibold" href="' . route('aplicacion', $row->lxid) . '">'
                        . '<span>' . $row->lx . ' ' . $row->hm . ' (' . $row->ps . ')' . '</span> ' . ' : ' . $row->min .
                        '</a></li>';
                }

                $output .= '</ul>';
            } else {
                $output = 'No hay resultados';
            }

            // Devuelve $output o pasa los datos a la vista según tus necesidades
            return $output;
        }
    }

    // function tseltal_fetch(Request $request)
    // {
    //     if ($request->has('query')) {
    //         $query = trim($request->input('query'));
    //         $query = str_replace('*', '%', $query);
    //         if (strpos($query, '%') === 0) {
    //             $data = DB::table('dics')
    //                 ->where('lx', 'like', '%' . substr($query, 1))
    //                 ->orderBy('lx', 'ASC')
    //                 ->orderBy('hm', 'ASC')
    //                 ->get();
    //         } elseif (strrpos($query, '%') === strlen($query) - 1) {
    //             $data = DB::table('dics')
    //                 ->where('lx', 'like', substr($query, 0, -1) . '%')
    //                 ->orderBy('lx', 'ASC')
    //                 ->orderBy('hm', 'ASC')
    //                 ->get();
    //         } else {
    //             $data = DB::table('dics')
    //                 ->where('lx', 'like', $query . '%')
    //                 ->orWhereRaw("FIND_IN_SET('$query', REPLACE(lxalt, '; ', ','))")
    //                 ->orderBy('lx', 'ASC')
    //                 ->orderBy('hm', 'ASC')
    //                 ->get();
    //         }

    //         if ($data->count() > 0) {
    //             $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';

    //             foreach ($data as $row) {
    //                 $output .= '
    //                     <li><a class="dropdown-item hover:font-semibold" href="' . route('aplicacion', $row->lxid) . '">'
    //                     . '<span>' . $row->lx . ' ' . $row->hm . ' (' . $row->ps . ')' . '</span> ' . ' : ' . $row->min .
    //                     '</a></li>
    //                 ';
    //             }

    //             $output .= '</ul>';
    //             echo $output;
    //         } else {
    //             return 'No hay resultados';
    //         }
    //     }
    // }


    function espanol_fetch(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');

            $query = str_replace('*', '%', $query);

            if (strpos($query, '%') === 0) {
                $data = DB::table('dics')
                    ->where('min', 'like', '%' . substr($query, 1))
                    ->orderBy('min', 'ASC')
                    ->get();
            } elseif (strrpos($query, '%') === strlen($query) - 1) {
                $data = DB::table('dics')
                    ->where('min', 'like', substr($query, 0, -1) . '%')
                    ->orderBy('min', 'ASC')
                    ->get();
            } else {
                $data = DB::table('dics')
                    ->where('min', 'like', $query . '%')
                    ->orWhere('m_multiple', 'like', '%' . $query . '%')
                    ->orderBy('min', 'ASC')
                    ->get();
            }

            if ($data->count() > 0) {
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
                foreach ($data as $row) {
                    $output .= '
                        <li><a class="dropdown-item" hover:font-semibold" href="' . route('aplicacion', $row->lxid) . '">'
                        . '<span>' . $row->min . '</span>' . ' <b>:</b> ' . ' (' . $row->ps . ') ' . $row->lx . ' ' . $row->hm .
                        '</a></li>
                    ';
                }
                $output .= '</ul>';
                echo $output;
            } else {
                return 'No hay resultados';
            }
        }
    }

    public function ver($lxid)
    {

        $abecedario = Abecedario::all();
        $palabra = Dic::where('lxid', $lxid)->first();

        $entrada = substr($palabra->lx, 0, 3);

        if (substr($palabra->lx, 0, 3) == '–') {
            $entrada = '–';
        }

        $palabras = Dic::where('lx', "LIKE", "$entrada%")
            ->orderBy('ly', 'ASC')->orderBy('hm', 'ASC')->get();

        if (count($palabras) < 10) {
            $entrada = $palabra->lx[0];
            $palabras = Dic::where('lx', "LIKE", "$entrada%")
                ->orderBy('ly', 'ASC')->orderBy('hm', 'ASC')->get();
        }

        $sentidos = Sentido::all();
        $exnums = Exnums::all();
        $dics = Dic::all();
        $referencias = Referencia::all();

        $buscador = Dic::orderBy('ly', 'ASC')->orderBy('hm', 'ASC')->get();

        return view('detalle', compact('abecedario', 'palabra', 'sentidos', 'exnums', 'dics', 'palabras', 'referencias', 'buscador'));
    }
}
