<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $table = 'caixas';
    protected $primaryKey = 'idCaixa';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'saldoInicial',
        'dataAbertura'
    ];

    public function itens()
    {
        return $this->hasMany(ItemCaixa::class, 'idCaixa', 'idCaixa');
    }
}