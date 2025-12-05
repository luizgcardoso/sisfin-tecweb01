<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'idEstado';
    public $timestamps = false;

    protected $fillable = ['nome', 'desc'];

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'idEstado', 'idEstado');
    }
}