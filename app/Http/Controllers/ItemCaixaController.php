<?php

namespace App\Http\Controllers;

use App\Models\ItemCaixa;
use App\Models\Caixa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ItemCaixaController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Movimentos do Caixa',
            'route' => 'itens-caixa',
            'pk' => 'idItem',
            'items' => ItemCaixa::with('caixa')->paginate(12),
            'fields' => ['idItem', 'descricao', 'valor', 'tipo', 'dataMov', 'caixa.nome'],
            'columns' => ['ID', 'Descrição', 'Valor', 'Tipo', 'Data', 'Caixa'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Movimento',
            'action' => route('itens-caixa.store'),
            'method' => 'POST',
            'route' => 'itens-caixa',
            'item' => new ItemCaixa(),
            'fields' => [
                [
                    'label' => 'Caixa',
                    'name' => 'idCaixa',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Caixa::orderBy('nome')->pluck('nome', 'idCaixa')
                ],
                [
                    'label' => 'Descrição',
                    'name' => 'descricao',
                    'type' => 'text',
                    'col' => 6,
                    'required' => true
                ],
                [
                    'label' => 'Valor',
                    'name' => 'valor',
                    'type' => 'number',
                    'col' => 6,
                    'step' => '0.01',
                    'required' => true
                ],
                [
                    'label' => 'Tipo',
                    'name' => 'tipo',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => [
                        'Entrada' => 'Entrada',
                        'Saída' => 'Saída'
                    ]
                ],
                [
                    'label' => 'Data',
                    'name' => 'dataMov',
                    'type' => 'date',
                    'col' => 6
                ],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCaixa' => 'required|exists:caixas,idCaixa',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:Entrada,Saída',
            'dataMov' => 'nullable|date',
        ]);

        ItemCaixa::create($request->all());

        return redirect()->route('itens-caixa.index')->with('success', 'Movimento registrado.');
    }

    public function edit(ItemCaixa $itens_caixa)
    {
        return view('crud.form', [
            'title' => 'Editar Movimento',
            'action' => route('itens-caixa.update', ['itens_caixa' => $itens_caixa->idItem]),
            'method' => 'PUT',
            'route' => 'itens-caixa',
            'item' => $itens_caixa,
            'fields' => [
                [
                    'label' => 'Caixa',
                    'name' => 'idCaixa',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Caixa::orderBy('nome')->pluck('nome', 'idCaixa')
                ],
                [
                    'label' => 'Descrição',
                    'name' => 'descricao',
                    'type' => 'text',
                    'col' => 6,
                    'required' => true
                ],
                [
                    'label' => 'Valor',
                    'name' => 'valor',
                    'type' => 'number',
                    'col' => 6,
                    'step' => '0.01',
                    'required' => true
                ],
                [
                    'label' => 'Tipo',
                    'name' => 'tipo',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => [
                        'Entrada' => 'Entrada',
                        'Saída' => 'Saída'
                    ]
                ],
                [
                    'label' => 'Data',
                    'name' => 'dataMov',
                    'type' => 'date',
                    'col' => 6
                ],
            ],
        ]);
    }

    public function update(Request $request, ItemCaixa $itens_caixa)
    {
        $request->validate([
            'idCaixa' => 'required|exists:caixas,idCaixa',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:Entrada,Saída',
            'dataMov' => 'nullable|date',
        ]);

        $itens_caixa->update($request->all());

        return redirect()->route('itens-caixa.index')->with('success', 'Movimento atualizado.');
    }

    public function destroy(ItemCaixa $itens_caixa)
    {
        $itens_caixa->delete();
        return redirect()->route('itens-caixa.index')->with('success', 'Movimento removido.');
    }
}