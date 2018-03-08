<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function (){
    return view('empresa');
});

Route::get('/contato', function (){
    return 'Contato';
})->name('contato');

Route::get('/index2', function(){
    return redirect()->route('contato');
});

Route::get('/categoria/{nomeCategoria}/ordem/{ordem?}', function($nomeCategoria, $ordem = ''){
    return "Categoria: {$nomeCategoria} - {$ordem}";
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', function(){
        return 'Home';
    });
    Route::get('/conf', function(){
        return 'Configurações';
    });
});



