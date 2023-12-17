<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.imagen');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            // Divide las imágenes en grupos de 20
            $imageGroups = array_chunk($images, 20);

            foreach ($imageGroups as $group) {
                foreach ($group as $image) {
                    if ($image->isValid()) {
                        $imageName = $image->getClientOriginalName();
                        $image->move(public_path('imagenes'), $imageName);
                    } else {
                        return redirect()->back()->withErrors(['images' => 'Una o más imágenes no son válidas.']);
                    }
                }
                // Procesa este grupo de imágenes, si es necesario
                // Por ejemplo, puedes enviar un trabajo a una cola aquí
            }
        }

        session()->flash('mensaje', '¡Las imágenes se cargaron correctamente!');

        return redirect()->route('imagen');
    }

}
