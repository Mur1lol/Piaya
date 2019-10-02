<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable = ['id','problema', 'tipo', 'lixeira', 'acontecimento', 'local', 'user_name'];

    public function users(){
		return $this->belongsTo(User::class);
	}
}
