<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadosSeeder extends Seeder
{
  public function run()
  {
    Estado::insert([
      ['nome' => 'Paraná', 'desc' => 'Estado do sul'],
      ['nome' => 'São Paulo', 'desc' => 'Maior economia do Brasil'],
      ['nome' => 'Minas Gerais', 'desc' => null],
    ]);
  }
}