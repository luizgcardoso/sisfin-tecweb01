<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Membro;

class MembrosSeeder extends Seeder
{
  public function run()
  {
    Membro::insert([
      ['idPessoa' => 1, 'funcao' => 'Tesoureiro', 'dataEntrada' => '2023-01-10'],
      ['idPessoa' => 2, 'funcao' => 'Secretária', 'dataEntrada' => '2023-03-22'],
    ]);
  }
}