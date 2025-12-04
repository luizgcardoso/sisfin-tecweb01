<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagamentoController extends Controller
{
    public function index()
    {
        return Pagamento::all();
    }

    public function store(Request $request)
    {
        return Pagamento::create($request->all());
    }

    public function show($id)
    {
        return Pagamento::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pag = Pagamento::findOrFail($id);
        $pag->update($request->all());
        return $pag;
    }

    public function destroy($id)
    {
        Pagamento::destroy($id);
        return response()->json(['message' => 'Pagamento removido com sucesso']);
    }
}