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

Route::group(['namespace'=>'Site'], function(){
    Route::get('/', 'SiteController@index'); // Route::get('/', 'Site\SiteController@index'); 
    Route::get('/contato', 'SiteController@contato');
    Route::get('/categoria/{idCategoria?}', 'SiteController@categoria');
});