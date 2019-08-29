<?php

Route::get('/teste', function () {
	// $pagina="<h1>Hello Routes!</h1>";
	// $pagina.="<h2>Me veja no browser</h2>";
	// return$pagina;

    return view('welcome');
});

Auth::routes();

Route::get('/',function(){
	return view('teste/teste');
})
->name('home');