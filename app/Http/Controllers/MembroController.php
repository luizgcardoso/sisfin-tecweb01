<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;

class MembroController extends Controller
{
    public function index()
    {
        return Membro::all();
    }

    public function store(Request $request)
    {
        return Membro::create($request->all());
    }

    public function show($id)
    {
        return Membro::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $membro = Membro::findOrFail($id);
        $membro->update($request->all());
        return $membro;
    }

    public function destroy($id)
    {
        Membro::destroy($id);
        return response()->json(['message' => 'Membro removido com sucesso']);
    }
}