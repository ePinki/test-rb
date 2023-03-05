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

Route::get('/', function () {
    return view('welcome');
});
Route::post('users/update/all', 'UsersController@updateAll');
Route::resource('/users', 'UsersController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
Route::get('/lastame/search', 'UsersController@searchLastname');
Route::get('/date/search', 'UsersController@searchDate');

Route::resource('/books', 'BooksController', ['only' => ['index']]);





//Route::post('/store/soap', 'SoapController@create');
Route::any('/soap/server', 'SoapServerController@index');
Route::resource('/books', 'BooksController',
                ['only' => ['index']]);
