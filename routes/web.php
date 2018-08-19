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

Route::get('/profile', function() {
	return view('profile');
});

Route::get('/settings', function() {
	return view('settings');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'topics' => 'TopicsController',
    'messages' => 'MessagesController',
    'projects' => 'ProjectsController'
]);

Route::get('/topics/{topicSlug}/projects/{projectSlug}', 'ProjectsController@show');



Route::get('/', function() {
	return view('index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
