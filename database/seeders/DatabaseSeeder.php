<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EstadosSeeder::class,
            CidadesSeeder::class,
            PessoasSeeder::class,
            MembrosSeeder::class,
            FornecedoresSeeder::class,
            CaixaSeeder::class,
        ]);
    }
}