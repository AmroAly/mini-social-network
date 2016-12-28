<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


// Home
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'    
]);

// Auth
Route::get('/signup', [
    'uses' => 'AuthController@getSignup',
    'as' => 'auth.signup',
    'middleware' => ['guest']
]);

Route::post('/signup', [
    'uses' => 'AuthController@postSignup',
    'middleware' => ['guest']
]);

Route::get('/signin', [
    'uses' => 'AuthController@getSignin',
    'as' => 'auth.signin',
    'middleware' => ['guest']
]);

Route::post('/signin', [
    'uses' => 'AuthController@postSignin',
    'middleware' => ['guest']
]);

Route::get('/signout', [
    'uses' => 'AuthController@getSignOut',
    'as' => 'auth.signout'
]);

// Search
Route::get('/search', [
    'uses' => 'SearchController@getResults',
    'as' => 'search.results'
]);

// Profile
Route::get('/user/{username}', [
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index'
]);

Route::get('/profile/edit', [
    'uses' => 'ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth']
]);

Route::post('/profile/edit', [
    'uses' => 'ProfileController@postEdit',
    'middleware' => ['auth']
]);

/*
* Friends
*/

Route::get('/friends', [
    'uses' => 'FriendController@getIndex',
    'as' => 'friend.index',
    'middleware' => ['auth']
]);

Route::get('/friends/add/{username}', [
    'uses' => 'FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => ['auth']
]);

Route::get('/friends/accept/{username}', [
    'uses' => 'FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => ['auth']
]);

/**
* Statuses
*/

Route::post('/status', [
    'uses' => 'StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth']
]);

Route::post('/status/{statusId}/reply', [
    'uses' => 'StatusController@postReply',
    'as' => 'status.reply',
    'middleware' => ['auth']
]);

Route::get('/status/{statusId}/like',[
    'uses' => 'StatusController@getLike',
    'as' => 'status.like',
    'middleware' => ['auth']
]);