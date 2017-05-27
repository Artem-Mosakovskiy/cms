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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/categories', 'CategoriesController@index');
Route::get('admin/addCategory', 'CategoriesController@add');
Route::get('admin/editCategory/{id}', 'CategoriesController@edit');
Route::get('admin/deleteCategory/{id}', 'CategoriesController@delete');

Route::post('admin/addCategory', 'CategoriesController@save');
Route::post('admin/editCategory', 'CategoriesController@update');


