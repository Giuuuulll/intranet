<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /* ============================
       1) PERFIL PRINCIPAL
    ============================ */
    public function index()
    {
        return view('perfil.index');
    }

    /* ============================
       2) FORMULARIO EDITAR PERFIL
    ============================ */
    public function editar()
    {
        return view('perfil.editar');
    }

    /* ============================
       3) GUARDAR CAMBIOS (nombre/email/bio)
    ============================ */
    public function actualizar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'bio' => 'nullable|max:300',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('perfil')->with('success', 'Datos actualizados correctamente');
    }

    /* ============================
       4) CAMBIAR FOTO
    ============================ */
    public function foto()
    {
        return view('perfil.foto');
    }

    public function actualizarFoto(Request $request)
    {
        $request->validate([
            'foto_perfil' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $user = auth()->user();

        if ($user->foto_perfil && Storage::exists('public/perfiles/' . $user->foto_perfil)) {
            Storage::delete('public/perfiles/' . $user->foto_perfil);
        }

        $file = $request->file('foto_perfil');
        $filename = 'perfil_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/perfiles', $filename);

        $user->foto_perfil = $filename;
        $user->save();

        return redirect()->route('perfil')->with('success', 'Foto actualizada');
    }

    /* ============================
       5) FORMULARIO CONTRASEÑA
    ============================ */
    public function password()
    {
        return view('perfil.password');
    }

    /* ============================
       6) ACTUALIZAR CONTRASEÑA
    ============================ */
    public function actualizarPassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->password_actual, $user->password)) {
            return back()->withErrors(['password_actual' => 'La contraseña actual es incorrecta']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('perfil')->with('success', 'Contraseña cambiada correctamente');
    }
}
