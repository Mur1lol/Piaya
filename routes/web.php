<?php

//DENUNCIAS -------------------------------------------------------------------------

Route::get('/denuncias', 'DenunciasController@index')
	->middleware('auth')
	->name('denuncias.index');

Route::get('/denuncias/create', 'DenunciasController@create')
	->name('denuncias.create');

Route::post('/denuncias', 'DenunciasController@store')
	->name('denuncias.store');

Route::put('/denuncias/{denuncia}', 'DenunciasController@update')
	->middleware('auth')
    ->name('denuncias.update');

Route::get('/denuncias/relatorio/{problema}.pdf', 'DenunciasController@gerarRelatorio')
	->middleware('auth')
	->name('denuncias.relatorio');

Route::get('/denuncias/grafico/{opcao}', 'DenunciasController@grafico')
	->middleware('auth')
	->name('denuncias.grafico');

//USUARIOS ---------------------------------------------------------------------------

Route::get('/solicitacao', 'UsersController@index')
	->middleware('auth')
	->name('users.index');

Route::get('/perfil/{user}', 'UsersController@show')
	->middleware('auth')
    ->name('users.show');

Route::get('/solicitacao/create', 'usersController@create')
	->name('users.create');

Route::post('/solicitacao', 'usersController@store')
	->name('users.store');

Route::put('/solicitacao/{user}', 'UsersController@updateUser')
	->middleware('auth')
    ->name('users.updateUser');

Route::get('/perfil/{user}/edit', 'UsersController@edit')
	->middleware('auth')
    ->name('users.edit');

Route::put('/perfil/{user}', 'UsersController@update')
	->middleware('auth')
    ->name('users.update');


Auth::routes();

Route::get('/', 'DenunciasController@index')
	->middleware('auth')
	->name('home');