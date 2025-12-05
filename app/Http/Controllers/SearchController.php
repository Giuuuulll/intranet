<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\Noticia;
use App\Models\Empleado;
use App\Models\Proceso;
use App\Models\Reglamento;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = trim($request->get('q', ''));
        if ($q === '') {
            return redirect()->back()->with('error', 'Ingresa un término de búsqueda.');
        }

        $like = '%' . $q . '%';

        $usuarios = User::query()
            ->where('name', 'like', $like)
            ->orWhere('email', 'like', $like)
            ->orWhere('rol', 'like', $like)
            ->limit(20)
            ->get();

        $documentos = Document::query()
            ->where('titulo', 'like', $like)
            ->orWhere('categoria', 'like', $like)
            ->orWhere('extension', 'like', $like)
            ->limit(20)
            ->get();

        $noticias = Noticia::query()
            ->where('titulo', 'like', $like)
            ->orWhere('contenido', 'like', $like)
            ->limit(20)
            ->get();

        $empleados = Empleado::query()
            ->where('nombre', 'like', $like)
            ->orWhere('departamento', 'like', $like)
            ->limit(20)
            ->get();

        $procesos = Proceso::query()
            ->where('titulo', 'like', $like)
            ->orWhere('archivo', 'like', $like)
            ->limit(20)
            ->get();

        $reglamentos = Reglamento::query()
            ->where('titulo', 'like', $like)
            ->orWhere('archivo', 'like', $like)
            ->limit(20)
            ->get();

        return view('search.results', compact(
            'q',
            'usuarios',
            'documentos',
            'noticias',
            'empleados',
            'procesos',
            'reglamentos'
        ));
    }
}
