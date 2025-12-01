<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reglamento;

class ReglamentoController extends Controller
{
    public function index()
    {
        $reglamentos = Reglamento::latest()->paginate(10);
        return view('reglamentos.index', compact('reglamentos'));
    }

    public function create()
    {
        return view('reglamentos.create');
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

        $file->storeAs('public/reglamentos', $nombre);

        Reglamento::create([
            'titulo' => $request->titulo,
            'archivo' => $nombre,
            'extension' => $extension,
            'subido_por' => 'Giuli',
        ]);

        return redirect()->route('reglamentos')->with('success', 'Reglamento subido correctamente');
    }

    public function descargar($id)
    {
        $r = Reglamento::findOrFail($id);
        return response()->download(storage_path('app/public/reglamentos/' . $r->archivo));
    }
}
