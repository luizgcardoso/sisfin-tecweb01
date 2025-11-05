<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'tipoAcesso',
        'inscricao',
        'nome',
        'endereco',
        'telefone',
        'email',
        'sexo',
        'dtNasc',
        'obs',
        'idCidade'
    ];
}