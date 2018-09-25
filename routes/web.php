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
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Experience;
use App\User;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/profile/{profileId}', function() {
    $user = User::find(Route::getCurrentRoute()->parameters()['profileId']);

    if($user == null || $user->creator == 0) {
        return view('error');
    }

    if(Auth::id() != $user->id) {
        return view('profile-others', [
            'user' => $user,
        ]);
    }

    return view('profile', [
        'user' => $user,
    ]);
});

Route::get('/profile/edit', function() {
    $user = Auth::user();

    return view('edit-profile', [
        'user' => $user
    ]);
})->middleware('auth');

Route::post('/profile/save', function(Request $request) {
    $user = Auth::user();

    if (Input::has('name')) { $user->name = Input::get('name'); }
    if (Input::has('email')) { $user->email = Input::get('email'); }
    if (Input::has('description')) { $user->description = Input::get('description'); }
    if (Input::has('avatar-file')) {
        $user->avatar = $request->file('avatar-file')->store('/assets', 'gcs');
    }

    $counter = 1;

    Experience::where('user_id', $user->id)->delete();

    while (Input::has('company_'.$counter) || Input::has('role_'.$counter) || Input::has('work-description_'.$counter) || Input::has('start-date_'.$counter) || Input::has('end-date_'.$counter)) {

        $experience = new Experience;

        $experience->company = Input::get('company_'.$counter);
        $experience->role = Input::get('role_'.$counter);
        $experience->description = Input::get('work-description_'.$counter);
        $experience->user_id = $user->id;
        $experience->start_date = Input::get('start-date_'.$counter);
        $experience->end_date = Input::get('end-date_'.$counter);

        $experience->save();

        $counter++;
    }


    $user->save();

    return redirect('profile');
})->middleware('auth');

Route::get('/profile', function() {
    $user = Auth::user();

	return view('profile', [
        'user' => $user
    ]);
})->middleware('auth');

Route::get('/about-us', function() {
    return view('about-us');
});

Route::get('/contact-us', function() {
    return view('contact-us');
});

Route::get('/notifications', function() {
    return view('notifications');
});

Route::get('/faq', function() {
    return view('faq');
});

Route::get('/file-upload', function() {
    return view('file-upload');
});

Route::get('/projects/selectSkill', 'ProjectsController@selectSkill');
Route::post('/projects/selectSkill', 'ProjectsController@selectSkill');

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
    // 'companies' => 'CompaniesController',
    'opportunities' => 'OpportunitiesController',
    'skills' => 'SkillsController',
    'messages' => 'MessagesController',
    'projects' => 'ProjectsController'
]);

Route::get('/skills/{skillSlug}/projects/{projectSlug}/edit', 'ProjectsController@edit')->middleware('auth');
Route::get('/skills/{skillSlug}/projects/{projectSlug}', 'ProjectsController@show')->middleware('auth');

Route::get('/', function() {
	return view('index');
});
