<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EstadoController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Estados',
            'route' => 'estados',
            'pk' => 'idEstado',
            'items' => Estado::orderBy('nome')->paginate(12),
            'fields' => ['idEstado', 'nome', 'desc'],
            'columns' => ['ID', 'Nome', 'Descrição'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Estado',
            'action' => route('estados.store'),
            'method' => 'POST',
            'route' => 'estados',
            'item' => new Estado(),
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Descrição', 'name' => 'desc', 'type' => 'textarea', 'col' => 6],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'desc' => 'nullable|string|max:255',
        ]);

        Estado::create($request->only(['nome', 'desc']));

        return redirect()->route('estados.index')->with('success', 'Estado criado com sucesso.');
    }

    public function edit(Estado $estado)
    {
        return view('crud.form', [
            'title' => 'Editar Estado',
            'action' => route('estados.update', ['estado' => $estado->idEstado]),
            'method' => 'PUT',
            'route' => 'estados',
            'item' => $estado,
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Descrição', 'name' => 'desc', 'type' => 'textarea', 'col' => 6],
            ],
        ]);
    }

    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'desc' => 'nullable|string|max:255',
        ]);

        $estado->update($request->only(['nome', 'desc']));

        return redirect()->route('estados.index')->with('success', 'Estado atualizado com sucesso.');
    }

    public function destroy(Estado $estado)
    {
        $estado->delete();
        return redirect()->route('estados.index')->with('success', 'Estado removido.');
    }
}