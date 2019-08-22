<?php

Route::get('/', function () {
	$pagina="<h1>Hello Routes!</h1>";
	$pagina.="<h2>Me veja no browser</h2>";
	return$pagina;

    // return view('welcome');
});

Route::get('/teste',function(){
	return view('teste/teste');
	// return view('layouts/template');
})
->name('home');
