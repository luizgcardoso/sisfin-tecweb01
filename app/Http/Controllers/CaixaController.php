<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CaixaController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'title' => 'Caixas',
            'route' => 'caixas',
            'pk' => 'idCaixa',
            'items' => Caixa::orderBy('nome')->paginate(12),
            'fields' => ['idCaixa', 'nome', 'saldoInicial', 'dataAbertura'],
            'columns' => ['ID', 'Nome', 'Saldo Inicial', 'Abertura'],
        ]);
    }

    public function create()
    {
        return view('crud.form', [
            'title' => 'Novo Caixa',
            'action' => route('caixas.store'),
            'method' => 'POST',
            'route' => 'caixas',
            'item' => new Caixa(),
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Saldo Inicial', 'name' => 'saldoInicial', 'type' => 'number', 'col' => 6, 'step' => '0.01', 'required' => true],
                ['label' => 'Data de Abertura', 'name' => 'dataAbertura', 'type' => 'date', 'col' => 6],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'saldoInicial' => 'nullable|numeric',
            'dataAbertura' => 'nullable|date',
        ]);

        Caixa::create($request->only(['nome', 'saldoInicial', 'dataAbertura']));

        return redirect()->route('caixas.index')->with('success', 'Caixa criado.');
    }

    public function edit(Caixa $caixa)
    {
        return view('crud.form', [
            'title' => 'Editar Caixa',
            'action' => route('caixas.update', ['caixa' => $caixa->idCaixa]),
            'method' => 'PUT',
            'route' => 'caixas',
            'item' => $caixa,
            'fields' => [
                ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'col' => 6, 'required' => true],
                ['label' => 'Saldo Inicial', 'name' => 'saldoInicial', 'type' => 'number', 'col' => 6, 'step' => '0.01'],
                ['label' => 'Data de Abertura', 'name' => 'dataAbertura', 'type' => 'date', 'col' => 6],
            ],
        ]);
    }

    public function update(Request $request, Caixa $caixa)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'saldoInicial' => 'nullable|numeric',
            'dataAbertura' => 'nullable|date',
        ]);

        $caixa->update($request->only(['nome', 'saldoInicial', 'dataAbertura']));

        return redirect()->route('caixas.index')->with('success', 'Caixa atualizado.');
    }

    public function destroy(Caixa $caixa)
    {
        $caixa->delete();
        return redirect()->route('caixas.index')->with('success', 'Caixa removido.');
    }
}