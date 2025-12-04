<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DespesaController extends Controller
{
    public function index()
    {
        return Despesa::all();
    }

    public function store(Request $request)
    {
        return Despesa::create($request->all());
    }

    public function show($id)
    {
        return Despesa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $despesa = Despesa::findOrFail($id);
        $despesa->update($request->all());
        return $despesa;
    }

    public function destroy($id)
    {
        Despesa::destroy($id);
        return response()->json(['message' => 'Despesa removida com sucesso']);
    }
}