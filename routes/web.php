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
Route::get('/category/{id}', 'PostsController@category');

Route::get('/search', 'PostsController@search');

/* categories CRUD */
Route::get('admin/categories', 'Admin\CategoriesController@index');
Route::get('admin/addCategory', 'Admin\CategoriesController@add');
Route::get('admin/editCategory/{id}', 'Admin\CategoriesController@edit');
Route::get('admin/deleteCategory/{id}', 'Admin\CategoriesController@delete');

Route::post('admin/addCategory', 'Admin\CategoriesController@save');
Route::post('admin/editCategory', 'Admin\CategoriesController@update');


Route::get('/admin', 'Admin\PostsController@index');
/* posts CRUD */
Route::get('admin/posts', 'Admin\PostsController@index');
Route::get('admin/search', 'Admin\PostsController@search');
Route::get('admin/addPost', 'Admin\PostsController@add');
Route::get('admin/editPost/{id}', 'Admin\PostsController@edit');
Route::get('admin/deletePost/{id}', 'Admin\PostsController@delete');

Route::post('admin/addPost', 'Admin\PostsController@save');
Route::post('admin/editPost', 'Admin\PostsController@update');

/* for moderating posts */
Route::get('/admin/preview/{id}', 'Admin\PostsController@preview');
Route::get('/admin/activatePost/{id}', 'Admin\PostsController@activatePost');

/* add or delete message to tinyMce editor*/
Route::post('admin/ajaxUploadImg', 'Admin\PostsController@ajaxUploadImg');
Route::get('admin/ajaxDeleteImages', 'Admin\PostsController@ajaxDeleteImages');

/* commnts CRUD */
Route::get('admin/comments', 'Admin\CommentsController@index');
Route::get('admin/deleteComment/{id}', 'Admin\CommentsController@delete');
Route::post('ajaxAddComment', 'CommentsController@ajaxAddComment');

/* users CRUD */
Route::get('admin/users', 'Admin\UsersController@index');
Route::get('admin/users/preview/{id}', 'Admin\UsersController@preview');

Route::post('admin/users/save', 'Admin\UsersController@save');
Route::get('admin/users/delete/{id}', 'Admin\UsersController@delete');
Route::post('admin/users/ajax', 'Admin\UsersController@ajaxGetUsers');

/* profile fucntions */
Route::get('/users/profile', 'UserController@profile');
Route::post('/user/password', 'UserController@updatePassword');
Route::post('/users/update', 'UserController@update');
Route::post('/uploadUserPhoto', 'UserController@uploadPhoto');


/* subscribers */
Route::post('/subscribe', 'EmailSubscriberController@subscribe');

Route::get('/admin/subscribers', 'Admin\EmailSubscriberController@index');
Route::get('/admin/deleteSubscriber/{id}', 'Admin\EmailSubscriberController@delete');

Route::get('/admin/sendToSubscribers', 'Admin\EmailSubscriberController@mailIndex');
Route::post('/admin/sendMail', 'Admin\EmailSubscriberController@sendMail');

/* pages */
Route::get('admin/pages', 'Admin\PagesController@index');
Route::get('admin/addPage', 'Admin\PagesController@add');
Route::get('admin/editPage/{id}', 'Admin\PagesController@edit');
Route::get('admin/deletePage/{id}', 'Admin\PagesController@delete');

Route::post('admin/addPage', 'Admin\PagesController@save');
Route::post('admin/editPage', 'Admin\PagesController@update');

Route::get('/pages/{slug}', 'PagesController@index');
