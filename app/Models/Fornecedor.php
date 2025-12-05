<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $primaryKey = 'idFornecedor';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa',
        'nome',
        'telefone',
        'email',
        'obs',
    ];
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa', 'idPessoa');
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class, 'idFornecedor', 'idFornecedor');
    }
}