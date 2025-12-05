<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    protected $table = 'recebimentos';
    protected $primaryKey = 'idRecebimento';
    public $timestamps = false;

    protected $fillable = [
        'idMembro',
        'descricao',
        'valor',
        'dataRec'
    ];

    public function membro()
    {
        return $this->belongsTo(Membro::class, 'idMembro', 'idMembro');
    }
}