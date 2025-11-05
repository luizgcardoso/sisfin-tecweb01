<?php

use Illuminate\Support\Facades\Route;

// Importando todos os Controllers
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\RecebimentoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ItemCaixaController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\RelatorioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui você registra as rotas da sua API. Elas são acessadas com prefixo /api
| Exemplo: http://127.0.0.1:8000/api/pessoas
|
*/

// Rota de teste
Route::get('/ping', function () {
  return response()->json(['message' => 'API SISFIN está rodando 🚀']);
});

// Rotas CRUD
Route::apiResource('estados', EstadoController::class);
Route::apiResource('cidades', CidadeController::class);
Route::apiResource('pessoas', PessoaController::class);
Route::apiResource('membros', MembroController::class);
Route::apiResource('fornecedores', FornecedorController::class);
Route::apiResource('despesas', DespesaController::class);
Route::apiResource('recebimentos', RecebimentoController::class);
Route::apiResource('pagamentos', PagamentoController::class);
Route::apiResource('itens-caixa', ItemCaixaController::class);
Route::apiResource('caixas', CaixaController::class);

// Rotas para relatórios
Route::prefix('relatorios')->group(function () {
  Route::get('recebimentos-por-membro/{id}', [RelatorioController::class, 'recebimentosPorMembro']);
  Route::get('recebimentos-por-tipo', [RelatorioController::class, 'recebimentosPorTipo']);
  Route::get('recebimentos-por-periodo', [RelatorioController::class, 'recebimentosPorPeriodo']);
  Route::get('saldo-caixa-por-periodo', [RelatorioController::class, 'saldoCaixaPorPeriodo']);
  Route::get('contas-a-pagar', [RelatorioController::class, 'contasAPagarPorPeriodo']);
  Route::get('pagamentos-por-periodo', [RelatorioController::class, 'pagamentosPorPeriodo']);
  Route::get('recebimentos-por-periodo', [RelatorioController::class, 'recebimentosPorPeriodo']);
});