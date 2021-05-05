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

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  Route::get('/rooms/{id}/items', 'App\Http\Controllers\ItemsController@index')->name('items.index');

  Route::get('/rooms/{id}/items/create', 'App\Http\Controllers\ItemsController@showCreateForm')->name('items.create');
  Route::post('/rooms/{id}/items/create', 'App\Http\Controllers\ItemsController@create');

  Route::get('/rooms/{id}/items/{item_id}/edit', 'App\Http\Controllers\ItemsController@showEditForm')->name('items.edit');
  Route::post('/rooms/{id}/items/{item_id}/edit', 'App\Http\Controllers\ItemsController@edit');

  Route::get('/rooms/create', 'App\Http\Controllers\RoomsController@showCreateForm')->name('rooms.create');
  Route::post('/rooms/create', 'App\Http\Controllers\RoomsController@create');

  Route::get('/rooms/{id}/edit', 'App\Http\Controllers\RoomsController@showEditForm')->name('rooms.edit');
  Route::post('/rooms/{id}/edit', 'App\Http\Controllers\RoomsController@edit');
});

Auth::routes();
