<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pessoa;

class PessoasSeeder extends Seeder
{
  public function run()
  {
    Pessoa::insert([
      [
        'nome' => 'João Silva',
        'email' => 'joao@gmail.com',
        'fone' => '(44) 99999-1111',
        'endereco' => 'Rua A, 123',
        'obs' => 'Nenhuma',
        'idCidade' => 1
      ],
      [
        'nome' => 'Maria Oliveira',
        'email' => 'maria@gmail.com',
        'fone' => '(44) 98888-2222',
        'endereco' => 'Rua B, 789',
        'obs' => null,
        'idCidade' => 2
      ]
    ]);
  }
}