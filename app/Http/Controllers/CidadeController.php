<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CidadeController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Cidades',
            'route' => 'cidades',
            'pk' => 'idCidade',
            'items' => Cidade::with('estado')->paginate(12),
            'fields' => ['idCidade', 'nome', 'estado.nome'],
            'columns' => ['ID', 'Cidade', 'Estado'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Nova Cidade',
            'action' => route('cidades.store'),
            'method' => 'POST',
            'route' => 'cidades',
            'item' => new Cidade(),
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],

                [
                    'label' => 'Estado',
                    'name' => 'idEstado',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Estado::orderBy('nome')->pluck('nome', 'idEstado')
                ]
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'idEstado' => 'required|exists:estados,idEstado',
        ]);

        Cidade::create($request->only(['nome', 'idEstado']));

        return redirect()->route('cidades.index')->with('success', 'Cidade criada.');
    }

    public function edit(Cidade $cidade)
    {
        return view('crud.form', [
            'title' => 'Editar Cidade',
            'action' => route('cidades.update', ['cidade' => $cidade->idCidade]),
            'method' => 'PUT',
            'route' => 'cidades',
            'item' => $cidade,
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],

                [
                    'label' => 'Estado',
                    'name' => 'idEstado',
                    'type' => 'select',
                    'col' => 6,
                    'required' => true,
                    'options' => Estado::orderBy('nome')->pluck('nome', 'idEstado')
                ]
            ],
        ]);
    }

    public function update(Request $request, Cidade $cidade)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'idEstado' => 'required|exists:estados,idEstado',
        ]);

        $cidade->update($request->only(['nome', 'idEstado']));

        return redirect()->route('cidades.index')->with('success', 'Cidade atualizada.');
    }

    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        return redirect()->route('cidades.index')->with('success', 'Cidade removida.');
    }
}