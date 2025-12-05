<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Fornecedores',
            'route' => 'fornecedores',
            'pk' => 'idFornecedor',
            'items' => Fornecedor::orderBy('nome')->paginate(12),
            'fields' => ['idFornecedor', 'nome', 'telefone', 'email'],
            'columns' => ['ID', 'Nome', 'Telefone', 'Email'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Fornecedor',
            'action' => route('fornecedores.store'),
            'method' => 'POST',
            'route' => 'fornecedores',
            'item' => new Fornecedor(),
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Telefone', 'name' => 'telefone', 'type' => 'text', 'col' => 6],
                ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'col' => 6],
                ['label' => 'Observações', 'name' => 'obs', 'type' => 'textarea', 'col' => 6],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'telefone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'obs' => 'nullable|string',
        ]);

        Fornecedor::create($request->only(['nome', 'telefone', 'email', 'obs']));

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor criado.');
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('crud.form', [
            'title' => 'Editar Fornecedor',
            'action' => route('fornecedores.update', ['fornecedor' => $fornecedor->idFornecedor]),
            'method' => 'PUT',
            'route' => 'fornecedores',
            'item' => $fornecedor,
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Telefone', 'name' => 'telefone', 'type' => 'text', 'col' => 6],
                ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'col' => 6],
                ['label' => 'Observações', 'name' => 'obs', 'type' => 'textarea', 'col' => 6],
            ],
        ]);
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'telefone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'obs' => 'nullable|string',
        ]);

        $fornecedor->update($request->only(['nome', 'telefone', 'email', 'obs']));

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado.');
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor removido.');
    }
}