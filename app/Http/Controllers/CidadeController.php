<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        return Cidade::all();
    }

    public function store(Request $request)
    {
        return Cidade::create($request->all());
    }

    public function show($id)
    {
        return Cidade::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cidade = Cidade::findOrFail($id);
        $cidade->update($request->all());
        return $cidade;
    }

    public function destroy($id)
    {
        Cidade::destroy($id);
        return response()->json(['message' => 'Cidade removida com sucesso']);
    }
}