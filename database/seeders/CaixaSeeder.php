<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Caixa;

class CaixaSeeder extends Seeder
{
  public function run()
  {
    Caixa::insert([
      [
        'nome' => 'Caixa Geral',
        'saldoInicial' => 500.00,
        'dataAbertura' => '2024-01-01'
      ]
    ]);
  }
}