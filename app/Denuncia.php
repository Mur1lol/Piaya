<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable = ['id','problema', 'tipo', 'lixeira', 'acontecimento', 'local', 'user_id'];

    public function user(){
		return $this->belongsTo(User::class);
	}
}
