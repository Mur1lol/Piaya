<?php

use App\Mail\EnviarEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/send-mail', function () {

    Mail::to('bc.murilo.mbc@gmail.com')->send(new EnviarEmail()); 

    return 'Mensagem Enviada!';

});

Route::get('/denuncias', 'DenunciasController@index')
	->middleware('auth')
	->name('denuncias.index');

Route::get('/denuncias/create', 'DenunciasController@create')
	->name('denuncias.create');

Route::post('/denuncias', 'DenunciasController@store')
	->name('denuncias.store');

Route::get('/denuncias/relatorio/{problema}.pdf', 'DenunciasController@gerarRelatorio')
	->middleware('auth')
	->name('denuncias.relatorio');

Route::get('/denuncias/grafico/{opcao}', 'DenunciasController@grafico')
	->middleware('auth')
	->name('denuncias.grafico');

Route::get('/perfil/{user}', 'DenunciasController@show')
	->middleware('auth')
    ->name('denuncias.show');

Route::get('/perfil/{user}/edit', 'DenunciasController@edit')
	->middleware('auth')
    ->name('denuncias.edit');

Route::put('/perfil/{user}', 'DenunciasController@update')
	->middleware('auth')
    ->name('denuncias.update');

Auth::routes();

Route::get('/', 'DenunciasController@index')
	->middleware('auth')
	->name('home');