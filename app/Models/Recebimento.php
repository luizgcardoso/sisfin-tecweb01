<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'tipoRecebimento',
        'dataRec',
        'horaRec',
        'valor',
        'descricao',
        'mesRef',
        'formaRecebimento',
        'idMembro'
    ];
}