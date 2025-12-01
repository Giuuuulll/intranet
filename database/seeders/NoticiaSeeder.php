<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Noticia;

class NoticiaSeeder extends Seeder
{
    public function run()
    {
        Noticia::create([
            'titulo' => 'Bienvenida al nuevo equipo de Garden',
            'contenido' => 'Damos la bienvenida a los nuevos colaboradores del área de TI y Administración.',
            'imagen' => 'noticia1.jpg'
        ]);

        Noticia::create([
            'titulo' => 'Capacitación Interna 2025 – Transformación Digital',
            'contenido' => 'El equipo participó en una jornada de capacitación sobre nuevas tecnologías.',
            'imagen' => 'noticia2.jpg'
        ]);

        Noticia::create([
            'titulo' => 'Evento Corporativo – Resultados del Año',
            'contenido' => 'Se presentaron los logros y proyecciones para el próximo año.',
            'imagen' => 'noticia3.jpg'
        ]);
    }
}
