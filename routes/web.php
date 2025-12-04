<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PessoaController;
use App\Models\Cidade;
use Symfony\Component\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
/*
Route::resource('estados', EstadoController::class);
Route::resource('cidades', CidadeController::class);
Route::resource('pessoas', PessoaController::class);
*/

Route::get('ola-mundo/', function () {
    $cidade = Cidade::all();
    return view('cidade.index')->with('cidade', $cidade);
});
/*
Route::get('show/{id}/', function (Request $request) {
    $cidade = Cidade::find($request->id);
    return view('cidades.show')->with('cidade', $cidade);
});*/