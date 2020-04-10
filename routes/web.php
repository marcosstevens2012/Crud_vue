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

Route::get('/categoria', function () {
    return view('categoria');
});

// API


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/producto', function () {
    return view('producto');
});

Route::group(['prefix'=>'api'],function(){
    Route::post('Categoria/add','API\CategoriaController@add');
    Route::get('Categoria/list','API\CategoriaController@list');
    Route::get('Categoria/disponible','API\CategoriaController@avalaible');
    Route::post('Categoria/change-status','API\CategoriaController@change_status');
  });