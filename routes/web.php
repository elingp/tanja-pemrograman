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

Route::get('/master', function () {
    return view('template.index');
});

Route::get('/', 'PertanyaanController@index');
Route::get('/pertanyaan', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::post('/pertanyaan', 'PertanyaanController@store');
Route::get('/pertanyaan/{id}/{slug}', 'PertanyaanController@show');
Route::get('/p/{id}', 'PertanyaanController@showRedirect');
Route::get('/pertanyaan/{id}/{slug}/edit', 'PertanyaanController@edit');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');

Route::post('/jawaban', 'JawabanController@store');
Route::post('/jawaban/{id}', 'JawabanController@makeSelected');

Route::post('/komen-pertanyaan', 'KomenController@storeTanya');
Route::post('/komen-jawaban', 'KomenController@storeJawab');

Route::get('/profil', 'ProfilController@index');

Route::get('/is_logged', 'LikeDisController@isLogged');
Route::post('/vote-pertanyaan', 'LikeDisController@storeTanya');
Route::post('/vote-jawaban', 'LikeDisController@storeJawab');

Auth::routes();
