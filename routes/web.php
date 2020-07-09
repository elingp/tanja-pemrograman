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

// Route::get('/pertanyaan/ask', 'QuestionController@showAsk');
// Route::post('/pertanyaan/ask', 'QuestionController@ask')->name('questions.ask');
// Route::post('/pertanyaan/answer', 'QuestionController@answer')->name('questions.answer');
// Route::post('/pertanyaan/comment', 'QuestionController@comment')->name('questions.comment');
// Route::get('/pertanyaan/{id}/{slug}', 'QuestionController@showQuestionDetail');
// Route::get('/pertanyaan/list', 'QuestionController@showQuestionList');
Route::get('/pertanyaan', 'PertanyaanController@index');

Auth::routes();

Route::get('/home', 'PertanyaanController@index')->name('home');


