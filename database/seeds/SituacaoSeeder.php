<?php

use App\situacao;
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
                'situacao' => 'inscrito',


            ]

        );
    }
}
