<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    // Listar documentos + buscador + filtros
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $categoria = $request->input('categoria');

        $documentos = Document::query();

        if ($buscar) {
            $documentos->where('titulo', 'like', "%$buscar%");
        }

        if ($categoria) {
            $documentos->where('categoria', $categoria);
        }

        $documentos = $documentos->latest()->paginate(10);

        return view('documentos.index', compact('documentos', 'buscar', 'categoria'));
    }

    // Formulario de carga
    public function create()
    {
        return view('documentos.upload');
    }

    // Guardar archivo
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'archivo' => 'required|file'
        ]);

        $file = $request->file('archivo');
        $nombre = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->storeAs('public/documentos', $nombre);

        Document::create([
            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'archivo' => $nombre,
            'extension' => $extension,
            'subido_por' => 'Giuli',
        ]);

        return redirect()->route('documentos')->with('success', 'Archivo subido correctamente');
    }

    // Descargar archivo
    public function descargar($id)
    {
        $doc = Document::findOrFail($id);
        return response()->download(storage_path("app/public/documentos/$doc->archivo"));
    }

    // Eliminar archivo
    public function eliminar($id)
    {
        $doc = Document::findOrFail($id);

        // Borrar el archivo físico
        if (file_exists(storage_path("app/public/documentos/$doc->archivo"))) {
            unlink(storage_path("app/public/documentos/$doc->archivo"));
        }

        $doc->delete();

        return redirect()->route('documentos')->with('success', 'Documento eliminado');
    }
}
