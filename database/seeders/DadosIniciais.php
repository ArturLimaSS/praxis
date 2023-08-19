<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//models

use App\Models\CidadeModel;
use App\Models\TipoLogradouroModel;

class DadosIniciais extends Seeder
{
    public function run()
    {
        DB::table('tipo_logradouro')->insert([
            ['nome' => 'Rua'],
            ['nome' => 'Avenida'],
            ['nome' => 'Praça'],
        ]);

        DB::table('cidade')->insert([
            ['nome' => 'Belo Horizonte'],
            ['nome' => 'Betim'],
            ['nome' => 'Contagem'],
        ]);
    }
}