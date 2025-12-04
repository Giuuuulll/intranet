<?php

namespace App\Helpers;

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;

class Actividad
{
    public static function registrar($accion, $detalle = null)
    {
        if (!Auth::check()) {
            return;
        }

        UserActivity::create([
            'user_id' => Auth::id(),
            'accion'  => $accion,
            'detalle' => $detalle,
        ]);
    }
}
