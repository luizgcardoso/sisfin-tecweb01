<?php

namespace App\Http\Controllers;

use App\Models\Recebimento;
use App\Models\Pagamento;
use App\Models\Caixa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RelatorioController extends Controller
{
    // Exemplo: Recebimentos por membro
    public function recebimentosPorMembro($id)
    {
        return Recebimento::where('idMembro', $id)->get();
    }

    // Recebimentos agrupados por tipo
    public function recebimentosPorTipo()
    {
        return Recebimento::selectRaw('tipoRecebimento, SUM(valor) as total')
            ->groupBy('tipoRecebimento')
            ->get();
    }

    // Recebimentos por período
    public function recebimentosPorPeriodo(Request $request)
    {
        return Recebimento::whereBetween('dataRec', [$request->inicio, $request->fim])->get();
    }

    // Pagamentos por período
    public function pagamentosPorPeriodo(Request $request)
    {
        return Pagamento::whereBetween('dataPag', [$request->inicio, $request->fim])->get();
    }

    // Saldo de caixa por período (simplificado)
    public function saldoCaixaPorPeriodo(Request $request)
    {
        return Caixa::whereBetween('data', [$request->inicio, $request->fim])->get();
    }

    // Contas a pagar (despesas ainda não pagas)
    public function contasAPagarPorPeriodo(Request $request)
    {
        return Pagamento::where('status', 'pendente')
            ->whereBetween('dataRef', [$request->inicio, $request->fim])
            ->get();
    }
}