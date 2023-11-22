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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('site');
})->name('index');

Route::resource('usuario', 'UsuarioController');
Route::resource('favorito', 'FavoritosController');
Route::resource('produto', 'ProdutosController');

Route::get('/site', 'SiteController@getData')->name('site');