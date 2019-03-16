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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'PropiedadesController@index')->name('propiedades.index');
Route::get('/propiedades/{id}', 'PropiedadesController@index')->name('propiedades.show');

Route::get('/{pagina}', 'PaginasController@show')->name('paginas.show');
