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

use Illuminate\Support\Facades\Input;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/profile', function() {
	return view('profile');
})->middleware('auth');

Route::post('/settings', function() {
    $user = Auth::user();

    if (Input::has('name'))
    {
    	$user->name = Input::get('name');
    }

    if (Input::has('email'))
    {
    	$user->email = Input::get('email');
    }

    if (Input::has('description'))
    {
    	$user->description = Input::get('description');
    }

    $user->save();

	return view('settings', [
		'user' => $user
	]);
})->middleware('auth');

Route::get('/settings', function() {
    $user = Auth::user();

	return view('settings', [
		'user' => $user
	]);
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'companies' => 'CompaniesController',
    'opportunities' => 'OpportunitiesController',
    'skills' => 'SkillsController',
    'messages' => 'MessagesController',
    'projects' => 'ProjectsController'
]);

Route::get('/skills/{skillSlug}/projects/{projectSlug}', 'ProjectsController@show')->middleware('auth');

Route::get('/', function() {
	return view('index');
});
