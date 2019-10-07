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

//shop items
Route::get('/', 'ProdutoController@shop');

//carrinho 
Route::get('/adicionar-ao-carrinho/{id}', 'ProdutoController@getAddToCart');
Route::get('/carrinho', 'ProdutoController@getCart');
Route::get('/reduzir/{id}', 'ProdutoController@getReduzirUm');
Route::get('/remover/{id}', 'ProdutoController@getRemoverUm');
Route::post('/carrinho', 'ProdutoController@finalizarVenda');

//vendas
Route::get('/relatorio', 'VendaController@relatorio');


//produtos
Route::get('/produtos', 'ProdutoController@index');
Route::view('produtos/cadastro', 'produtos/cadastro');
Route::post('/produtos/cadastro', 'ProdutoController@store');
Route::get('produtos/editar/{id}', 'ProdutoController@show');
Route::put('produtos/editar/{id}', 'ProdutoController@update');
Route::delete('produtos/deletar/{id}', 'ProdutoController@delete');

//users
Route::get('/usuarios', 'UserController@index');
Route::get('/usuarios/show/{id}', 'UserController@show');
Route::delete('/usuarios/deletar/{id}', 'UserController@delete');






//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
