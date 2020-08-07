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


Route::get('/', 'PageController@inicio');
Route::get('foo/{numero}', function ($numero) {
    return 'Hello World'.$numero;
})->where('numero', '[0-9]+');
Route::get('administrador','PageController@administrar')->name('administrador');
Route::post('/agregarcat','PageController@agregar')->name('categoria.agregar');
Route::get('/eliminarcat', 'PageController@eliminar')->name('categoria.eliminar');
Route::get('/editarcat', 'PageController@editar')->name('categoria.editar');


Route::get('cliente','PageController@cliente')->name('cliente');
Route::get('/eliminarcli', 'PageController@eliminarcli')->name('cliente.eliminar');
Route::get('/editarcli', 'PageController@editarcli')->name('cliente.editar');

Route::get('catalogo','PageController@catalogo')->name('catalogo');
Route::get('/agregarctgp','PageController@agregarctgo')->name('catalogo.agregar');
Route::get('/eliminarctgo', 'PageController@eliminarctgo')->name('catalogo.eliminar');
Route::get('/editarctgo', 'PageController@editarctgo')->name('catalogo.editar');

Route::get('producto','PageController@producto')->name('producto');
Route::get('/agregarctpto','PageController@agregarpto')->name('producto.agregar');
Route::get('/eliminarpto', 'PageController@eliminarpto')->name('producto.eliminar');
Route::get('/editarpto', 'PageController@editarcpto')->name('producto.editar');

Route::get('/categoriasF','Inicio@ctrlcategoria')->name('categoriasF');
Route::get('/social','Inicio@social')->name('social');
Route::get('/realizarpedido','Inicio@realizarpedido')->name('realizarpedido');
Route::get('/verpedido','Inicio@verpedido')->name('verpedido');
Route::get('/buscarproducto','Inicio@buscarpto')->name('buscarpto');
Route::get('/detalle','Inicio@agregardetalle')->name('detalle');
Route::get('/eliminar','Inicio@eliminar')->name('detalle.eliminar');
Route::get('/pedido','Inicio@agregarpedido')->name('pedido');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{website}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{website}/callback', 'Auth\LoginController@handleProviderCallback');
