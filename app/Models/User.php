<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Campos que se pueden editar masivamente
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'foto_perfil',
        'bio',
    ];

    /**
     * Campos ocultos
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts automáticos
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 🔥 ACTIVIDAD RECIENTE
     * Un usuario tiene muchas actividades
     */
    public function actividad()
    {
        return $this->hasMany(UserActivity::class)->latest();
    }
}
