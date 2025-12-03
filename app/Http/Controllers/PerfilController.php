<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /* ===========================
       MOSTRAR PERFIL
    ============================ */
    public function index()
    {
        $usuario = Auth::user();
        return view('perfil.index', compact('usuario'));
    }


    /* ===========================
       ACTUALIZAR DATOS BÁSICOS
    ============================ */
    public function actualizar(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('ok', 'Datos actualizados correctamente');
    }


    /* ===========================
       ACTUALIZAR FOTO DE PERFIL
    ============================ */
    public function actualizarFoto(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nombre = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('perfil'), $nombre);

            $user->foto = $nombre;
            $user->save();
        }

        return back()->with('ok', 'Foto actualizada');
    }


    /* ===========================
       CAMBIAR CONTRASEÑA
    ============================ */
    public function actualizarPassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required',
            'password_nueva' => 'required|min_length:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_actual, $user->password)) {
            return back()->with('error', 'La contraseña actual no es correcta');
        }

        $user->password = Hash::make($request->password_nueva);
        $user->save();

        return back()->with('ok', 'Contraseña actualizada correctamente');
    }
}
