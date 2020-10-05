<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/Produto/{id?}','ProdutoController@produto');

// Route::post('/Produto/{id?}','ProdutoController@adicionar');

// Route::put('/Produto/{id?}','ProdutoController@salvar');



//curso





//teste

Route::group(['middleware'=>'auth'], function()
{
    Route::get('/Produto','ProdutoController@produto')->name('produtos');
    Route::get('/Produto/adicionar','ProdutoController@adicionar')->name('adicionar');
    Route::post('/Produto/salvar','ProdutoController@salvar')->name('salvar');
    Route::get('/Produto/editar/{id}','ProdutoController@editar')->name('editar');
    Route::put('/Produto/atualizar/{id}','ProdutoController@atualizar')->name('atualizar');
    Route::delete('/Produto/deletar/{id}','ProdutoController@deletar')->name('deletar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
