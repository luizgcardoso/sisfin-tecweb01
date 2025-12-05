<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DespesaController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Despesas',
            'route' => 'despesas',
            'pk' => 'idDespesa',
            'items' => Despesa::orderBy('dataDesp', 'desc')->paginate(12),
            'fields' => ['idDespesa', 'descricao', 'categoria', 'valor', 'dataDesp'],
            'columns' => ['ID', 'Descrição', 'Categoria', 'Valor', 'Data'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Nova Despesa',
            'action' => route('despesas.store'),
            'method' => 'POST',
            'route' => 'despesas',
            'item' => new Despesa(),
            'fields' => [
                ['label' => 'Descrição', 'name' => 'descricao', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Categoria', 'name' => 'categoria', 'type' => 'text', 'col' => 6],
                ['label' => 'Valor', 'name' => 'valor', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data', 'name' => 'dataDesp', 'type' => 'date', 'col' => 6],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:150',
            'valor' => 'required|numeric',
            'dataDesp' => 'nullable|date',
        ]);

        Despesa::create($request->only(['descricao', 'categoria', 'valor', 'dataDesp']));

        return redirect()->route('despesas.index')->with('success', 'Despesa criada.');
    }

    public function edit(Despesa $despesa)
    {
        return view('crud.form', [
            'title' => 'Editar Despesa',
            'action' => route('despesas.update', ['despesa' => $despesa->idDespesa]),
            'method' => 'PUT',
            'route' => 'despesas',
            'item' => $despesa,
            'fields' => [
                ['label' => 'Descrição', 'name' => 'descricao', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Categoria', 'name' => 'categoria', 'type' => 'text', 'col' => 6],
                ['label' => 'Valor', 'name' => 'valor', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data', 'name' => 'dataDesp', 'type' => 'date', 'col' => 6],
            ],
        ]);
    }

    public function update(Request $request, Despesa $despesa)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:150',
            'valor' => 'required|numeric',
            'dataDesp' => 'nullable|date',
        ]);

        $despesa->update($request->only(['descricao', 'categoria', 'valor', 'dataDesp']));

        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada.');
    }

    public function destroy(Despesa $despesa)
    {
        $despesa->delete();
        return redirect()->route('despesas.index')->with('success', 'Despesa removida.');
    }
}