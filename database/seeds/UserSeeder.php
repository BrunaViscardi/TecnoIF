<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        [
            'name' => 'Candidato',
            'email' => 'candidato@gmail.com',
            'password' => Hash::make('senha123'),
            'role'=> 0,

        ]

        );
        User::create(
            [
                'name' => 'Gestor',
                'email' => 'equipeGestora@gmail.com',
                'password' => Hash::make('senha123'),
                'role'=> 1,

            ]

        );
        User::create(
            [
                'name' => 'Coordenador',
                'email' => 'coordenador@gmail.com',
                'password' => Hash::make('senha123'),
                'role'=> 2,

            ]

        );

    }
}
