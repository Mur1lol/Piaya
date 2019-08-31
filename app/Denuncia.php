<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable = ['id','tipo', 'informacao', 'extra', 'acontecimento', 'local'];
}
