<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso;

class ProcesoController extends Controller
{
    public function index()
    {
        $procesos = Proceso::latest()->paginate(10);
        return view('procesos.index', compact('procesos'));
    }

    public function create()
    {
        return view('procesos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'archivo' => 'required|file'
        ]);

        $file = $request->file('archivo');
        $nombre = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->storeAs('public/procesos', $nombre);

        Proceso::create([
            'titulo' => $request->titulo,
            'archivo' => $nombre,
            'extension' => $extension,
            'subido_por' => 'Giuli',
        ]);

        return redirect()->route('procesos')->with('success', 'Proceso subido correctamente');
    }

    public function descargar($id)
    {
        $p = Proceso::findOrFail($id);
        return response()->download(storage_path('app/public/procesos/' . $p->archivo));
    }
}
