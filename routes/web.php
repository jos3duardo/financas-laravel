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
//    return view('home');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('category')->group(function () {
    Route::get('/', 'CategoryController@index')->name('category-index');
    Route::get('/create', 'CategoryController@create')->name('category-create');
    Route::post('/store', 'CategoryController@store')->name('category-store');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('category-edit');
    Route::post('/{id}/update', 'CategoryController@update')->name('category-update');
    Route::get('/{id}/show', 'CategoryController@show')->name('category-show');
    Route::get('/{id}/delete', 'CategoryController@destroy')->name('category-delete');
});
Route::prefix('receitas')->group(function () {
    Route::get('/', 'ReceitasController@index')->name('receita-index');
    Route::get('/create', 'ReceitasController@create')->name('receita-create');
    Route::post('/store', 'ReceitasController@store')->name('receita-store');
    Route::get('/{id}/edit', 'ReceitasController@edit')->name('receita-edit');
    Route::post('/{id}/update', 'ReceitasController@update')->name('receita-update');
    Route::get('/{id}/show', 'ReceitasController@show')->name('receita-show');
    Route::get('/{id}/delete', 'ReceitasController@destroy')->name('receita-delete');
});
Route::prefix('despesas')->group(function () {
    Route::get('/', 'DespesasController@index')->name('despesa-index');
    Route::get('/create', 'DespesasController@create')->name('despesa-create');
    Route::post('/store', 'DespesasController@store')->name('despesa-store');
    Route::get('/{id}/edit', 'DespesasController@edit')->name('despesa-edit');
    Route::post('/{id}/update', 'DespesasController@update')->name('despesa-update');
    Route::get('/{id}/show', 'DespesasController@show')->name('despesa-show');
    Route::get('/{id}/delete', 'DespesasController@destroy')->name('despesa-delete');
});
Route::prefix('extrato')->group(function () {
    Route::get('/', 'ExtratoController@index')->name('extrato-index');
    Route::post('/detalhes', 'ExtratoController@detalhes')->name('extrato-detalhes');
});
Route::prefix('grafico')->group(function () {
    Route::get('/', 'GraficoController@index')->name('grafico-index');
    Route::post('/grafico', 'GraficoController@grafico')->name('grafico-grafico');
});
