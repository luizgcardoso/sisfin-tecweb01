<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedoresSeeder extends Seeder
{
  public function run()
  {
    Fornecedor::insert([
      ['nome' => 'Papelaria ABC', 'telefone' => '44988887777', 'email' => 'abc@gmail.com'],
      ['nome' => 'Supermercado XYZ', 'telefone' => '44992223333', 'email' => 'xyz@gmail.com'],
    ]);
  }
}