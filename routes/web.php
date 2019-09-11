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


Route::get('/user','UserController@showsUser')->name('shows.user');
Route::get('/user/{user}','BoardController@showBoards')->name('user.boards');
Route::post('/user/{user}/board','BoardController@store')->name('create.board');
Route::delete('/user/board/{board}','BoardController@destroy')->name('delete.board');
Route::put('/user/board/{board}','BoardController@update')->name('update.board');
Route::get('/user/{user}/board/{board}/todo','BoardController@showTodo')->name('board.todos');
Route::post('/board/{board}/todo','TodoController@createTodo')->name('create.todo');
Route::delete('/board/todo/{todo}','TodoController@destroyTodo')->name('destroy.todo');
Route::put('/board/todo/{todo}','TodoController@updateTodo')->name('update.todo');
Route::get('/user/{user}/board/{board}/do','BoardController@showDo')->name('board.dos');
Route::post('/board/{board}/do','DoController@createDo')->name('create.do');
Route::delete('/board/do/{do}','DoController@destroyDo')->name('destroy.do');
Route::put('/board/do/{do}','DoController@updateDo')->name('update.do');
Route::get('/user/{user}/board/{board}/done','BoardController@showDone')->name('board.dones');
Route::post('/board/{board}/done','DoneController@createDone')->name('create.done');
Route::delete('/board/done/{done}','DoneController@destroyDone')->name('destroy.done');
Route::put('/board/done/{done}','DoneController@updateDone')->name('update.done');



Route::get('/todoapp/{id}','DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



