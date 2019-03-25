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
Route::get('/busqueda', 'PropiedadesController@busqueda')->name('propiedades.busqueda');

Route::get('/casas/{id}', 'CasasController@show')->name('casas.show');
Route::get('/bodegas/{id}', 'BodegasController@show')->name('bodegas.show');
Route::get('/apartamentos/{id}', 'ApartamentosController@show')->name('apartamentos.show');
Route::get('/estacionamientos/{id}', 'EstacionamientosController@show')->name('estacionamientos.show');
Route::get('/locales_comerciales/{id}', 'LocalesComercialesController@show')->name('locales_comerciales.show');
Route::get('/oficinas/{id}', 'OficinasController@show')->name('oficinas.show');
Route::get('/terrenos/{id}', 'TerrenosController@show')->name('terrenos.show');

Route::get('/{pagina}', 'PaginasController@show')->name('paginas.show');
