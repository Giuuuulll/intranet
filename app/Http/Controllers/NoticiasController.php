<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    // Listado de noticias
    public function index()
    {
        $noticias = Noticia::latest()->paginate(10);
        return view('noticias.index', compact('noticias'));
    }

    // Crear noticia
    public function create()
    {
        return view('noticias.create');
    }

    // Guardar noticia
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'image|mimes:jpg,jpeg,png|max:4048'
        ]);

        $nombreImagen = null;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/noticias', $nombreImagen);
        }

        Noticia::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $nombreImagen,
            'autor' => 'Giuli', 
        ]);

        return redirect()->route('noticias')->with('success', 'Noticia creada con éxito');
    }

    // Mostrar noticia individual
    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.show', compact('noticia'));
    }
}
