<?php

use App\Situacao;
use Illuminate\Database\Seeder;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situacao::create(
            [
                'situacao' => 'Inscrito',
            ]
        );
        Situacao::create(
            [
                'situacao' => 'Em andamento',
            ]
        );
        Situacao::create(
            [
                'situacao' => 'Finalizado',
            ]
        );
        Situacao::create(
            [
                'situacao' => 'Rejeitado',
            ]
        );
    }
}
