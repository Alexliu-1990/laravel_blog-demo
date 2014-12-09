<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



/*
 *model binding
 */
Route::model('post', 'Post');
Route::model('comment', 'Comment');

/*
 *post
 */
Route::get('/post/{post}/show', array('as'=>'post.show', 'uses'=>'PostController@showPost'));

/*
 *postForm
 */
Route::post('/post/{post}/show', array('as'=>'form', 'uses'=>'PostController@postForm'));

/*
 *postSearch
 */

Route::controller('/', 'BlogController');
