<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Noticia;
use App\Models\Document;
use App\Models\Empleado;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');

        $usuarios = User::where('name', 'like', "%$q%")
                        ->orWhere('rol', 'like', "%$q%")
                        ->get();

        $documentos = Document::where('titulo', 'like', "%$q%")->get();
        $noticias   = Noticia::where('titulo', 'like', "%$q%")->get();
        $empleados  = Empleado::where('nombre', 'like', "%$q%")->get();

        return view('search.results', compact('q', 'usuarios', 'documentos', 'noticias', 'empleados'));
    }
}
