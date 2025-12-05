<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MembroController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Membros',
            'route' => 'membros',
            'pk' => 'idMembro',
            'items' => Membro::with('pessoa')->paginate(12),
            'fields' => ['idMembro', 'pessoa.nome', 'funcao', 'dataEntrada'],
            'columns' => ['ID', 'Pessoa', 'Função', 'Entrada'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Membro',
            'action' => route('membros.store'),
            'method' => 'POST',
            'route' => 'membros',
            'item' => new Membro(),
            'fields' => [
                [
                    'label' => 'Pessoa',
                    'name' => 'idPessoa',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Pessoa::orderBy('nome')->pluck('nome', 'idPessoa')
                ],
                [
                    'label' => 'Função',
                    'name' => 'funcao',
                    'type' => 'text',
                    'col' => 6
                ],
                [
                    'label' => 'Data de Entrada',
                    'name' => 'dataEntrada',
                    'type' => 'date',
                    'col' => 6
                ],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPessoa' => 'required|exists:pessoas,idPessoa',
            'funcao' => 'nullable|string|max:150',
            'dataEntrada' => 'nullable|date',
        ]);

        Membro::create($request->all());

        return redirect()->route('membros.index')->with('success', 'Membro criado.');
    }

    public function edit(Membro $membro)
    {
        return view('crud.form', [
            'title' => 'Editar Membro',
            'action' => route('membros.update', ['membro' => $membro->idMembro]),
            'method' => 'PUT',
            'route' => 'membros',
            'item' => $membro,
            'fields' => [
                [
                    'label' => 'Pessoa',
                    'name' => 'idPessoa',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Pessoa::orderBy('nome')->pluck('nome', 'idPessoa')
                ],
                [
                    'label' => 'Função',
                    'name' => 'funcao',
                    'type' => 'text',
                    'col' => 6
                ],
                [
                    'label' => 'Data de Entrada',
                    'name' => 'dataEntrada',
                    'type' => 'date',
                    'col' => 6
                ],
            ],
        ]);
    }

    public function update(Request $request, Membro $membro)
    {
        $request->validate([
            'idPessoa' => 'required|exists:pessoas,idPessoa',
            'funcao' => 'nullable|string|max:150',
            'dataEntrada' => 'nullable|date',
        ]);

        $membro->update($request->all());

        return redirect()->route('membros.index')->with('success', 'Membro atualizado.');
    }

    public function destroy(Membro $membro)
    {
        $membro->delete();
        return redirect()->route('membros.index')->with('success', 'Membro removido.');
    }
}