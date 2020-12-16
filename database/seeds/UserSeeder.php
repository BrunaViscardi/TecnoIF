<?php

use App\Mentorado;
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

           $id = DB::table('mentorados')->insert([
               'nome' => 'Mentorado',
           'data_nascimento' => '2003-03-02' ,
            'telefone' => '(99)99999-9999',
           'cpf'=>'063.961.211-31' ,
           'rg' => '3333',
           'endereco'=> 'bla bla',
           'email' =>'Mentorado@gmail.com',
           'campus'=>'Jardim'
       ]
       );

        User::create(
        [
            'name' => 'Mentorado',
            'email' => 'Mentorado@gmail.com',
            'password' => Hash::make('senha123'),
            'role'=> 0,
            'mentorado_id'=> $id
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
