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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/articles','articlesController@index')->name('articles.index');
Route::get('/articles/create','articlesController@create')->name('articles.create');
Route::post('/articles','articlesController@store')->name('articles.store');
Route::get('/articles/{id}','articlesController@show')->name('articles.show');
Route::get('/articles/{id}/edit','articlesController@edit')->name('articles.edit');
Route::put('/articles/{id}','articlesController@update')->name('articles.update');
Route::delete('/articles/{id}','articlesController@destroy')->name('articles.destroy');


Route::get('/tags','tagsController@index')->name('tags.index');
Route::get('/tags/create','tagsController@create')->name('tags.create');
Route::post('/tags','tagsController@store')->name('tags.store');
Route::get('/tags/{id}','tagsController@show')->name('tags.show');
Route::get('/tags/{id}/edit','tagsController@edit')->name('tags.edit');
Route::put('/tags/{id}','tagsController@update')->name('tags.update');
Route::delete('/tags/{id}','tagsController@destroy')->name('tags.destroy');


Route::get('/categories','categoriesController@index')->name('categories.index');
Route::get('/categories/create','categoriesController@create')->name('categories.create');
Route::post('/categories','categoriesController@store')->name('categories.store');
Route::get('/categories/{id}','categoriesController@show')->name('categories.show');
Route::get('/categories/{id}/edit','categoriesController@edit')->name('categories.edit');
Route::put('/categories/{id}','categoriesController@update')->name('categories.update');
Route::delete('/categories/{id}','categoriesController@destroy')->name('categories.destroy');

