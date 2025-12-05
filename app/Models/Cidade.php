<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $primaryKey = 'idCidade';
    public $timestamps = false;

    protected $fillable = ['nome', 'idEstado'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado', 'idEstado');
    }

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'idCidade', 'idCidade');
    }
}