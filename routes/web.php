<?php

Route::get('/teste', function () {
	// $pagina="<h1>Hello Routes!</h1>";
	// $pagina.="<h2>Me veja no browser</h2>";
	// return$pagina;

    return view('welcome');
});

Route::get('/denuncias', 'DenunciasController@index')
	->middleware('auth')
	->name('denuncias.index');

Route::get('/aa', function() {
	return view('denuncias/teste');
});

Auth::routes();

Route::get('/', 'DenunciasController@index')
->name('home');