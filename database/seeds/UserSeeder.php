<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => 'Bruna Viscardi',
            'email' => 'bruna@gmail.com',
            'password' => Hash::make('senha123'),
            'role'=> 1
        ]);
        */
        User::create(
        [
            'name' => 'João Silva',
            'email' => 'joao@gmail.com',
            'password' => Hash::make('senha123'),
            'role'=> 1,

        ]

        );
        User::create(
            [
                'name' => 'Gestor',
                'email' => 'gestor@gmail.com',
                'password' => Hash::make('senha123'),
                'role'=> 0,

            ]

        );
    }
}
