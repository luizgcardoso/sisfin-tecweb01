<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $table = 'despesas';
    protected $primaryKey = 'idDespesa';
    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'categoria',
        'valor',
        'dataDesp'
    ];
}