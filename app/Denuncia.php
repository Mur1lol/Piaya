<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable = ['id','problema', 'tipo', 'lixeira', 'acontecimento', 'local'];
}
