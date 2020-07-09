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

Route::get('/pertanyaan/add', 'PertanyaanController@add');
Route::post('/pertanyaan/add', 'PertanyaanController@save')->name('pertanyaan.ask');
// Route::post('/pertanyaan/answer', 'PertanyaanController@answer')->name('pertanyaan.answer');
// Route::post('/pertanyaan/comment', 'PertanyaanController@comment')->name('pertanyaan.comment');
// Route::get('/pertanyaan/{id}/{slug}', 'PertanyaanController@showQuestionDetail');
// Route::get('/pertanyaan/list', 'PertanyaanController@showQuestionList');
Route::get('/pertanyaan', 'PertanyaanController@index');
// here last update by boy

Auth::routes();

Route::get('/home', 'PertanyaanController@index')->name('home');


