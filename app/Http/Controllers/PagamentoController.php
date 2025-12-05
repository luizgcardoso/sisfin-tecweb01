<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagamentoController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Pagamentos',
            'route' => 'pagamentos',
            'pk' => 'idPagamento',
            'items' => Pagamento::with('fornecedor')->paginate(12),
            'fields' => ['idPagamento', 'descricao', 'valor', 'dataPag', 'fornecedor.nome'],
            'columns' => ['ID', 'Descrição', 'Valor', 'Data', 'Fornecedor'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Pagamento',
            'action' => route('pagamentos.store'),
            'method' => 'POST',
            'route' => 'pagamentos',
            'item' => new Pagamento(),
            'fields' => [
                ['label' => 'Descrição', 'name' => 'descricao', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Valor', 'name' => 'valor', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data', 'name' => 'dataPag', 'type' => 'date', 'col' => 6],
                [
                    'label' => 'Fornecedor',
                    'name' => 'idFornecedor',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Fornecedor::orderBy('nome')->pluck('nome', 'idFornecedor')
                ],
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'dataPag' => 'nullable|date',
            'idFornecedor' => 'required|exists:fornecedores,idFornecedor',
        ]);

        Pagamento::create($request->all());

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento criado.');
    }

    public function edit(Pagamento $pagamento)
    {
        return view('crud.form', [
            'title' => 'Editar Pagamento',
            'action' => route('pagamentos.update', ['pagamento' => $pagamento->idPagamento]),
            'method' => 'PUT',
            'route' => 'pagamentos',
            'item' => $pagamento,
            'fields' => [
                ['label' => 'Descrição', 'name' => 'descricao', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Valor', 'name' => 'valor', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data', 'name' => 'dataPag', 'type' => 'date', 'col' => 6],
                [
                    'label' => 'Fornecedor',
                    'name' => 'idFornecedor',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Fornecedor::orderBy('nome')->pluck('nome', 'idFornecedor')
                ],
            ]
        ]);
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        $request->validate([
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'dataPag' => 'nullable|date',
            'idFornecedor' => 'required|exists:fornecedores,idFornecedor',
        ]);

        $pagamento->update($request->all());

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento atualizado.');
    }

    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();
        return redirect()->route('pagamentos.index')->with('success', 'Pagamento removido.');
    }
}