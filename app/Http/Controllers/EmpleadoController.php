<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    // Lista de todos los empleados
    public function index()
    {
        $empleados = Empleado::all();
        return view('cumpleanos.index', compact('empleados'));
    }

    // Formulario de agregar empleado
    public function create()
    {
        return view('cumpleanos.create');
    }

    // Guardar empleado
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date',
            'foto' => 'image|mimes:jpg,jpeg,png|max:4048',
        ]);

        $fotoNombre = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/empleados', $fotoNombre);
        }

        Empleado::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'departamento' => $request->departamento,
            'foto' => $fotoNombre,
        ]);

        return redirect()->route('cumpleanos')->with('success', 'Empleado agregado correctamente');
    }
}
