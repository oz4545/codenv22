<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['correo' => 'usuario@ejemplo.com'],
            [
                'nombre' => 'Jonh',
                'apellido' => 'Doe',
                'contraseña' => bcrypt('contraseña'), // Usa bcrypt para encriptar la contraseña
            ]
        );
    }
}
