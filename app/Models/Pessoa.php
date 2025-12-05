<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $primaryKey = 'idPessoa';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'email',
        'fone',
        'endereco',
        'obs',
        'idCidade'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'idCidade', 'idCidade');
    }

    public function membro()
    {
        return $this->hasOne(Membro::class, 'idPessoa', 'idPessoa');
    }
}