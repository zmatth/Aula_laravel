<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/listar','Api\ProdutoController@listar');
Route::post('/salvar','Api\ProdutoController@salvar');
Route::get('/buscar/{id}','Api\ProdutoController@buscar');
Route::put('/atualizar{id}','Api\ProdutoController@atualizar');
Route::delete('/deletar{id}','Api\ProdutoController@deletar');

