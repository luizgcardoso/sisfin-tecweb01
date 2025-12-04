<?php

namespace App\Http\Controllers;

use App\Models\Recebimento;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RecebimentoController extends Controller
{
    public function index()
    {
        return Recebimento::all();
    }

    public function store(Request $request)
    {
        return Recebimento::create($request->all());
    }

    public function show($id)
    {
        return Recebimento::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $rec = Recebimento::findOrFail($id);
        $rec->update($request->all());
        return $rec;
    }

    public function destroy($id)
    {
        Recebimento::destroy($id);
        return response()->json(['message' => 'Recebimento removido com sucesso']);
    }
}