<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $fillable = ['id','titulo', 'descricao', 'user_id'];

    public function user(){
		return $this->belongsTo(User::class);
	}
}
