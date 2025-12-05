<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamentos';
    protected $primaryKey = 'idPagamento';
    public $timestamps = false;

    protected $fillable = [
        'idFornecedor',
        'descricao',
        'valor',
        'dataPag'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'idFornecedor', 'idFornecedor');
    }
}