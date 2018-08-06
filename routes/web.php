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

Route::resources([
    'topics' => 'TopicsController'
]);

Route::get('/topics/{topicSlug}/useCases/{useCaseSlug}', 'UseCasesController@show');

Route::get('/', function() {
	return view('index');
});
