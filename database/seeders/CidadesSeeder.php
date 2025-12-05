<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadesSeeder extends Seeder
{
  public function run()
  {
    Cidade::insert([
      ['nome' => 'Umuarama', 'idEstado' => 1],
      ['nome' => 'Curitiba', 'idEstado' => 1],
      ['nome' => 'São Paulo', 'idEstado' => 2],
    ]);
  }
}