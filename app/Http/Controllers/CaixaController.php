<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function index()
    {
        return Caixa::all();
    }

    public function store(Request $request)
    {
        return Caixa::create($request->all());
    }

    public function show($id)
    {
        return Caixa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $caixa = Caixa::findOrFail($id);
        $caixa->update($request->all());
        return $caixa;
    }

    public function destroy($id)
    {
        Caixa::destroy($id);
        return response()->json(['message' => 'Caixa removido com sucesso']);
    }
}