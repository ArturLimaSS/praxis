<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DadosIniciais extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_logradouro')->insert([
            ["nome" => "Rua"],
            ["nome" => "Avenida"],
            ["nome" => "Praça"]
        ]);

        DB::table('cidade')->insert([
            ["nome" => "Belo Horizonte"],
            ["nome" => "Betim"],
            ["nome" => "Contagem"]
        ]);
    }
}
