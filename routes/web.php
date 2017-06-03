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

Route::get('admin/posts', 'PostsController@index');
Route::get('admin/search', 'PostsController@search');
Route::get('admin/addPost', 'PostsController@add');
Route::get('admin/editPost/{id}', 'PostsController@edit');
Route::get('admin/deletePost/{id}', 'PostsController@delete');

Route::post('admin/ajaxUploadImg', 'PostsController@ajaxUploadImg');
Route::get('admin/ajaxDeleteImages', 'PostsController@ajaxDeleteImages');

Route::post('admin/addPost', 'PostsController@save');
Route::post('admin/editPost', 'PostsController@update');

Route::get('admin/comments', 'CommentsController@index');
Route::get('admin/deleteComments/{id}', 'CommentsController@delete');
