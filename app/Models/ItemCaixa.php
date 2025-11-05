<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCaixa extends Model
{
    use HasFactory;
    protected $table = 'itens_caixa';
    protected $fillable = ['tipoItem', 'data', 'valor', 'desc', 'idPessoa'];
}