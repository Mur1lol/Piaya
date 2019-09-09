<?php

Route::get('/teste', function () {
	// $pagina="<h1>Hello Routes!</h1>";
	// $pagina.="<h2>Me veja no browser</h2>";
	// return$pagina;

    return view('home');
});

Route::get('/denuncias', 'DenunciasController@index')
	->middleware('auth')
	->name('denuncias.index');

Route::get('/denuncias/relatorio/{problema}', 'DenunciasController@gerarRelatorio')
	->middleware('auth')
	->name('denuncias.relatorio');

Route::get('/denuncias/grafico', 'DenunciasController@grafico')
	->middleware('auth')
	->name('denuncias.grafico');

Auth::routes();

Route::get('/', 'DenunciasController@index')
	->middleware('auth')
	->name('home');