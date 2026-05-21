<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos el usuario administrador
        // El campo password se hashea automaticamente gracias al cast del modelo
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@library.com',
            'password' => 'password',
            'role'     => 'admin',
        ]);

        // Creamos un usuario normal para probar el flujo de busqueda
        User::create([
            'name'     => 'John Doe',
            'email'    => 'user@library.com',
            'password' => 'password',
            'role'     => 'user',  // Por defecto, pero lo ponemos explicito para claridad
        ]);
    }
}
