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

Route::get('/', 'PostsController@showPosts');
Route::get('/home', 'PostsController@showPosts');

Route::get('/posts/view/{id}', 'PostsController@view');


Route::get('admin/categories', 'Admin\CategoriesController@index');
Route::get('admin/addCategory', 'Admin\CategoriesController@add');
Route::get('admin/editCategory/{id}', 'Admin\CategoriesController@edit');
Route::get('admin/deleteCategory/{id}', 'Admin\CategoriesController@delete');

Route::post('admin/addCategory', 'Admin\CategoriesController@save');
Route::post('admin/editCategory', 'Admin\CategoriesController@update');

Route::get('admin/posts', 'Admin\PostsController@index');
Route::get('admin/search', 'Admin\PostsController@search');
Route::get('admin/addPost', 'Admin\PostsController@add');
Route::get('admin/editPost/{id}', 'Admin\PostsController@edit');
Route::get('admin/deletePost/{id}', 'Admin\PostsController@delete');

Route::post('admin/ajaxUploadImg', 'Admin\PostsController@ajaxUploadImg');
Route::get('admin/ajaxDeleteImages', 'Admin\PostsController@ajaxDeleteImages');

Route::post('admin/addPost', 'Admin\PostsController@save');
Route::post('admin/editPost', 'Admin\PostsController@update');

Route::get('admin/comments', 'Admin\CommentsController@index');
Route::get('admin/deleteComments/{id}', 'Admin\CommentsController@delete');
Route::post('ajaxAddComment', 'CommentsController@ajaxAddComment');
