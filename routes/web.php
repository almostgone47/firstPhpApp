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

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'PostsController@index');

Route::get('/posts/{id}', 'PostsController@show');

Route::group(['middleware'=>'admin'], function(){
    
    Route::get('/admin', 'AdminController@index');

    Route::resource('/admin/users', 'AdminUsersController');

    Route::resource('/admin/posts', 'AdminPostsController');

    Route::resource('/admin/categories', 'AdminCategoriesController');

    Route::resource('/admin/medias', 'AdminMediasController');

    Route::resource('/admin/comments', 'CommentsController');

    Route::resource('admin/comments/replies', 'CommentRepliesController');
});

Route::group(['middleware'=>'auth'], function(){

    Route::post('comment', 'CommentsController@store');

    Route::post('comment/reply', 'CommentRepliesController@store');

});