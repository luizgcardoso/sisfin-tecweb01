<?php

namespace App\Http\Controllers;

use App\Models\Recebimento;
use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RecebimentoController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Recebimentos',
            'route' => 'recebimentos',
            'pk' => 'idRecebimento',
            'items' => Recebimento::with('membro')->paginate(12),
            'fields' => ['idRecebimento', 'descricao', 'valor', 'dataRec', 'membro.pessoa.nome'],
            'columns' => ['ID', 'Descrição', 'Valor', 'Data', 'Membro'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Recebimento',
            'action' => route('recebimentos.store'),
            'method' => 'POST',
            'route' => 'recebimentos',
            'item' => new Recebimento(),
            'fields' => [
                ['label' => 'Descrição', 'name' => 'descricao', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Valor', 'name' => 'valor', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data', 'name' => 'dataRec', 'type' => 'date', 'col' => 6],
                [
                    'label' => 'Membro',
                    'name' => 'idMembro',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Membro::with('pessoa')->get()->pluck('pessoa.nome', 'idMembro')
                ],
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'dataRec' => 'nullable|date',
            'idMembro' => 'required|exists:membros,idMembro',
        ]);

        Recebimento::create($request->all());

        return redirect()->route('recebimentos.index')->with('success', 'Recebimento criado.');
    }

    public function edit(Recebimento $recebimento)
    {
        return view('crud.form', [
            'title' => 'Editar Recebimento',
            'action' => route('recebimentos.update', ['recebimento' => $recebimento->idRecebimento]),
            'method' => 'PUT',
            'route' => 'recebimentos',
            'item' => $recebimento,
            'fields' => [
                ['label' => 'Descrição', 'name' => 'descricao', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Valor', 'name' => 'valor', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data', 'name' => 'dataRec', 'type' => 'date', 'col' => 6],
                [
                    'label' => 'Membro',
                    'name' => 'idMembro',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Membro::with('pessoa')->get()->pluck('pessoa.nome', 'idMembro')
                ],
            ]
        ]);
    }

    public function update(Request $request, Recebimento $recebimento)
    {
        $request->validate([
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'dataRec' => 'nullable|date',
            'idMembro' => 'required|exists:membros,idMembro',
        ]);

        $recebimento->update($request->all());

        return redirect()->route('recebimentos.index')->with('success', 'Recebimento atualizado.');
    }

    public function destroy(Recebimento $recebimento)
    {
        $recebimento->delete();
        return redirect()->route('recebimentos.index')->with('success', 'Recebimento removido.');
    }
}