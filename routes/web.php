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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tv/show/{id}', 'TvResourceController@show')->name('tv.show');
Route::get('/tv/follow/{id}', 'TvResourceController@follow')->name('tv.follow');
Route::get('/tv/search', 'TvResourceController@search')->name('tv.search');

Route::get('/episode/show/{id}', 'EpisodeController@show')->name('episode.show');
Route::get('/episode/like/{id}', 'EpisodeController@like')->name('episode.like');

