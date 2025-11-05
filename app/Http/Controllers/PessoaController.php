<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        return Pessoa::all();
    }

    public function store(Request $request)
    {
        return Pessoa::create($request->all());
    }

    public function show($id)
    {
        return Pessoa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($request->all());
        return $pessoa;
    }

    public function destroy($id)
    {
        Pessoa::destroy($id);
        return response()->noContent();
    }
}