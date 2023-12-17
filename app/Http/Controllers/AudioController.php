<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.audio');
    }

    public function import(Request $request)
    {
        $request->validate([
            'audios.*' => 'file|mimes:mp3,wav|max:2048',
        ]);

        if ($request->hasFile('audios')) {
            foreach ($request->file('audios') as $audio) {
                $audioName = $audio->getClientOriginalName();
                $audio->move(public_path('audios'), $audioName);
            }
        }

        session()->flash('mensaje', '¡La audios se cargaron correctamente!');

        return redirect()->route('audio');
    }
}
