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

// Route::get('/', function () {
//     return view('pertanyaan');
// });
Route::get('/', 'PertanyaanController@index')->name('home');

Route::get('/pertanyaan', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::post('/pertanyaan', 'PertanyaanController@store');
Route::get('/pertanyaan/{id}/{slug}', 'PertanyaanController@show');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');
// Route::post('/pertanyaan/answer', 'PertanyaanController@answer')->name('pertanyaan.answer');
// Route::post('/pertanyaan/comment', 'PertanyaanController@comment')->name('pertanyaan.comment');
// Route::get('/pertanyaan/{id}/{slug}', 'PertanyaanController@showQuestionDetail');
// Route::get('/pertanyaan/list', 'PertanyaanController@showQuestionList');
// here last update by boy

Auth::routes();
