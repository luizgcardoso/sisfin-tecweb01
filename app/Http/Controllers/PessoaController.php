<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PessoaController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Pessoas',
            'route' => 'pessoas',
            'pk' => 'idPessoa',
            'items' => Pessoa::with('cidade')->paginate(12),
            'fields' => ['idPessoa', 'nome', 'email', 'cidade.nome'],
            'columns' => ['ID', 'Nome', 'Email', 'Cidade'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Nova Pessoa',
            'action' => route('pessoas.store'),
            'method' => 'POST',
            'route' => 'pessoas',
            'item' => new Pessoa(),
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'col' => 6],
                ['label' => 'Telefone', 'name' => 'fone', 'type' => 'text', 'col' => 6],
                ['label' => 'Endereço', 'name' => 'endereco', 'type' => 'text', 'col' => 6],
                [
                    'label' => 'Cidade',
                    'name' => 'idCidade',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Cidade::orderBy('nome')->pluck('nome', 'idCidade')
                ],
                ['label' => 'Observações', 'name' => 'obs', 'type' => 'textarea', 'col' => 12],
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'nullable|email|max:150',
            'fone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'idCidade' => 'required|exists:cidades,idCidade',
            'obs' => 'nullable|string',
        ]);

        Pessoa::create($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa criada.');
    }

    public function edit(Pessoa $pessoa)
    {
        return view('crud.form', [
            'title' => 'Editar Pessoa',
            'action' => route('pessoas.update', ['pessoa' => $pessoa->idPessoa]),
            'method' => 'PUT',
            'route' => 'pessoas',
            'item' => $pessoa,
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'col' => 6],
                ['label' => 'Telefone', 'name' => 'fone', 'type' => 'text', 'col' => 6],
                ['label' => 'Endereço', 'name' => 'endereco', 'type' => 'text', 'col' => 6],
                [
                    'label' => 'Cidade',
                    'name' => 'idCidade',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Cidade::orderBy('nome')->pluck('nome', 'idCidade')
                ],
                ['label' => 'Observações', 'name' => 'obs', 'type' => 'textarea', 'col' => 12],
            ]
        ]);
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'nullable|email|max:150',
            'fone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'idCidade' => 'required|exists:cidades,idCidade',
            'obs' => 'nullable|string',
        ]);

        $pessoa->update($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada.');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa removida.');
    }
}