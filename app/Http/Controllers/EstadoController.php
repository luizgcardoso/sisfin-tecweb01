<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        return Estado::all();
    }

    public function store(Request $request)
    {
        return Estado::create($request->all());
    }

    public function show($id)
    {
        return Estado::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::findOrFail($id);
        $estado->update($request->all());
        return $estado;
    }

    public function destroy($id)
    {
        Estado::destroy($id);
        return response()->json(['message' => 'Estado removido com sucesso']);
    }
}