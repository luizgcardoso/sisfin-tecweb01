<?php

use App\Http\Controllers\CaixaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ItemCaixaController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\RecebimentoController;
use App\Models\Cidade;
use Symfony\Component\Http\Request;

Route::view('/', 'home');

Route::resource('estados', EstadoController::class);
Route::resource('cidades', CidadeController::class);
Route::resource('pessoas', PessoaController::class);
Route::resource('membros', MembroController::class);
Route::resource('fornecedores', FornecedorController::class);
Route::resource('recebimentos', RecebimentoController::class);
Route::resource('pagamentos', PagamentoController::class);
Route::resource('despesas', DespesaController::class);
Route::resource('caixas', CaixaController::class);
Route::resource('itens-caixa', ItemCaixaController::class);