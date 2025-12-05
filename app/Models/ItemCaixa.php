<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCaixa extends Model
{
    protected $table = 'itens_caixa';
    protected $primaryKey = 'idItem';
    public $timestamps = false;

    protected $fillable = [
        'idCaixa',
        'descricao',
        'valor',
        'tipo',
        'dataMov'
    ];

    public function caixa()
    {
        return $this->belongsTo(Caixa::class, 'idCaixa', 'idCaixa');
    }
}