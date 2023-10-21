<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Administrator',
            'short_code' => 'Admin',
        ]);

        Role::create([
            'title' => 'PROFESOR',
            'short_code' => 'Profe',

        ]);

        Role::create([
            'title' => 'PADRES',
            'short_code' => 'Padre',
        ]);

        Role::create([
            'title' => 'ESTUDIANTES',
            'short_code' => 'Estudiante',
        ]);
    }
}
