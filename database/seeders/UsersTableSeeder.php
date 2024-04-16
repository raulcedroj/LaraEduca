<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        // Crear usuarios con roles
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $adminUser->assignRole('admin');

        $user = User::create([
            'name' => 'Raul',
            'email' => 'raul@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('alumno');

        $user = User::create([
            'name' => 'Roberto',
            'email' => 'roberto@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('profesor');
    }
}