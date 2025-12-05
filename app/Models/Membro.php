<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $table = 'membros';
    protected $primaryKey = 'idMembro';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa',
        'funcao',
        'dataEntrada'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa', 'idPessoa');
    }

    public function recebimentos()
    {
        return $this->hasMany(Recebimento::class, 'idMembro', 'idMembro');
    }
}