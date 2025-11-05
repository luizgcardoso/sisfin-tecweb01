<?php

namespace App\Http\Controllers;

use App\Models\ItemCaixa;
use Illuminate\Http\Request;

class ItemCaixaController extends Controller
{
    public function index()
    {
        return ItemCaixa::all();
    }

    public function store(Request $request)
    {
        return ItemCaixa::create($request->all());
    }

    public function show($id)
    {
        return ItemCaixa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $item = ItemCaixa::findOrFail($id);
        $item->update($request->all());
        return $item;
    }

    public function destroy($id)
    {
        ItemCaixa::destroy($id);
        return response()->json(['message' => 'Item de caixa removido com sucesso']);
    }
}