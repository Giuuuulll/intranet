<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'rrhh',
            'email' => 'rrhh@garden.com',
            'password' => Hash::make('123456'),
            'rol' => 'rrhh',
        ]);

        User::create([
            'name' => 'ti',
            'email' => 'ti@garden.com',
            'password' => Hash::make('123456'),
            'rol' => 'ti',
        ]);

        User::create([
            'name' => 'auditoria',
            'email' => 'auditoria@garden.com',
            'password' => Hash::make('123456'),
            'rol' => 'auditoria',
        ]);
    }
}
