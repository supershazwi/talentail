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

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendContactMail;
use Illuminate\Validation\Rule;

use App\Experience;
use App\User;
use App\Role;
use App\Project;
use App\RoleGained;
use App\ShoppingCart;
use App\ShoppingCartLineItem;
use App\Message;
use App\ContactMessage;
use App\CreatorApplication;
use App\AttemptedProject;

use Pusher\Laravel\Facades\Pusher;

use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

Route::get('welcome', function() {
    return view('welcome');
});

Route::get('/portfolio', function() {
    return view('portfolio');
});

Route::post('/shopping-cart/empty-cart', function(Request $request) {
    $shoppingCartId = Input::get('shopping_cart_id');

    ShoppingCartLineItem::where('shopping_cart_id', $shoppingCartId)->delete();
    ShoppingCart::destroy($shoppingCartId);

    return redirect('/shopping-cart');
});

Route::post('/shopping-cart/remove-line-item', function(Request $request) {
    ShoppingCartLineItem::destroy(Input::get('shopping_cart_line_item_id'));

    $shoppingCart = ShoppingCart::find(Input::get('shopping_cart_id'));
    $shoppingCart->no_of_items = $shoppingCart->no_of_items - 1;

    $shoppingCart->total = 0;

    foreach($shoppingCart->shopping_cart_line_items as $shoppingCartLineItem) {
        $shoppingCart->total = $shoppingCart->total + $shoppingCartLineItem->project->amount;
    }

    $shoppingCart->save();

    return redirect('/shopping-cart');
});

Route::get('/shopping-cart', function() {
    $shoppingCart = ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first();
    return view('shoppingCart', [
        'shoppingCart' => $shoppingCart,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
})->middleware('auth');;

Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');

Route::get('tutorials/create-projects', function() {
    return view('tutorials.create-projects',[
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('tutorials/attempt-projects', function() {
    return view('tutorials.attempt-projects',[
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('tutorials', function() {
    return view('tutorials.index',[
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('privacy-policy', function() {
    return view('privacy',[
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('terms-and-conditions', function() {
    return view('terms', [
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('/verifyuser', function() {
    return view('emails.verifyUser');
});

Route::get('/sendemail', function() {
    Mail::send('thetalentail@gmail.com', ['title' => 'You have been contacted', 'content' => 'Hi'], function ($message) use ($attach)
    {

        $message->from('yolomolotolo@gmail.com', 'Christian Nwamba');

        $message->to('chrisn@scotch.io');

        //Attach file
        $message->attach($attach);

        //Add a subject
        $message->subject("Hello from Scotch");

    });
});


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/send-message', function() {
    Mail::to('supershazwi@gmail.com')->send(new UserRegistered());
});


Route::post('/messages/{userId}', 'MessagesController@sendMessage');

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger('my-channel', 'my-event', array('message' => 'hello world'));

    return view('welcome', [
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('/creators', function() {
    $creators = User::where('creator', 1)->get();

    return view('creators.index', [
        'creators' => $creators,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('/bridge-2', function() {
    return view('welcome-2');
})->middleware('verified');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes(['verify' => true]);

Route::get('/profile/edit', function() {
    $user = Auth::user();

    foreach($user->experiences as $experience) {
        $experience->description = preg_replace("/\r\n\r\n/","\r\n",$experience->description);

        // dd($experience->description);

        $experience->save();

        // dd(preg_replace("/\r\n\r\n/","\r\n",$experience->description));
    }

    return view('edit-profile', [
        'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
})->middleware('auth');

Route::get('/profile/{profileId}', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $loggedInUserId = Auth::id();

    $clickedUserId = $routeParameters['profileId'];

    $subscribeString;

    if($loggedInUserId < $clickedUserId) {
        $subscribeString = $loggedInUserId . "_" . $clickedUserId;
    } else {
        $subscribeString = $clickedUserId . "_" . $loggedInUserId;   
    }

    $user = User::find(Route::getCurrentRoute()->parameters()['profileId']);

    if($user == null) {
        return view('error');
    }

    $rolesGained = RoleGained::where('user_id', Auth::id())->get();
    $attemptedProjects = AttemptedProject::where('user_id', Auth::id())->get();

    $messages1 = Message::where('sender_id', $loggedInUserId)->where('recipient_id', $clickedUserId)->where('project_id', 0)->get();
    $messages2 = Message::where('sender_id', $clickedUserId)->where('recipient_id', $loggedInUserId)->where('project_id', 0)->get();
    $messages3 = $messages1->merge($messages2);

    $messages3 = $messages3->sortBy('created_at');

    return view('profile', [
        'user' => $user,
        'rolesGained' => $rolesGained,
        'messages' => $messages3,
        'clickedUserId' => $clickedUserId,
        'attemptedProjects' => $attemptedProjects,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'messageChannel' => 'messages_'.$subscribeString,
    ]);
});

Route::get('projects/clone', function() {
    if(session('selectedRole')) {
        $selectedRole = Role::find(session('selectedRole')); 
    }

    return view('projects.clone', [
        'sampleProjects' => Project::where('sample', 1)->get(),
        'createdProjects' => Project::where('user_id', Auth::id())->get(),
        'selectedRole' => $selectedRole,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::post('/projects/apply', function(Request $request) {
    $creatorApplication = new CreatorApplication;

    $creatorApplication->description = $request->input('description');
    $creatorApplication->user_id = Auth::id();

    $creatorApplication->save();

    return redirect('projects/create')->with('status', 'Your application has been submitted. We will get back to you shortly.');
});

Route::post('/profile/save', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'slug' => [
            Rule::unique('users')->ignore(Auth::id()),
        ],
    ]);


    if($validator->fails()) {
        return redirect('/profile/edit')
                    ->withErrors($validator)
                    ->withInput();
    } else {
        $user = Auth::user();

        if (Input::has('name')) { $user->name = Input::get('name'); }
        if (Input::has('email')) { $user->email = Input::get('email'); }
        if (Input::has('slug')) { $user->slug = Input::get('slug'); }
        if (Input::has('website')) { $user->website = Input::get('website'); }
        if (Input::has('facebook')) { $user->facebook = Input::get('facebook'); }
        if (Input::has('linkedin')) { $user->linkedin = Input::get('linkedin'); }
        if (Input::has('twitter')) { $user->twitter = Input::get('twitter'); }
        if (Input::has('description')) { $user->description = Input::get('description'); }
        if (Input::has('avatar-file')) {
            // $user->avatar = $request->file('avatar-file')->store('/assets', 'gcs');
            $user->avatar = Storage::disk('gcs')->put('/avatars', $request->file('avatar-file'), 'public');
        }

        $counter = 1;

        if(Experience::where('user_id', $user->id)) {
            Experience::where('user_id', $user->id)->delete();
        }

        while (Input::has('company_'.$counter) || Input::has('role_'.$counter) || Input::has('work-description_'.$counter) || Input::has('start-date_'.$counter) || Input::has('end-date_'.$counter)) {

            $experience = new Experience;

            $experience->company = Input::get('company_'.$counter);
            $experience->role = Input::get('role_'.$counter);
            $experience->description = preg_replace("/[\r\n]/","\r\n",Input::get('work-description_'.$counter));
            $experience->user_id = $user->id;
            $experience->start_date = Input::get('start-date_'.$counter);
            if(Input::get('end-date_'.$counter) == null) {
                $experience->end_date = 0;
            } else {
                $experience->end_date = Input::get('end-date_'.$counter);
            }

            $experience->save();

            $counter++;
        }

        $user->save();

        return redirect('profile');
    }
})->middleware('auth');

Route::get('/profile', function() {
    $user = Auth::user();

    // find out skills gained
    $rolesGained = RoleGained::where('user_id', Auth::id())->get();
    $attemptedProjects = AttemptedProject::where('user_id', Auth::id())->get();

	return view('profile', [
        'user' => $user,
        'rolesGained' => $rolesGained,
        'attemptedProjects' => $attemptedProjects,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
})->middleware('auth');

Route::get('/about-us', function() {
    return view('about-us', [
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::post('contact-us', function(Request $request) {
    $contactMessage = new ContactMessage;

    $contactMessage->name = $request->input('name');
    $contactMessage->description = $request->input('description');
    $contactMessage->email = $request->input('email');

    $contactMessage->save();

    Mail::to('thetalentail@gmail.com')->send(new SendContactMail($contactMessage));

    return redirect('/contact-us')->with('contactStatus', 'Thank you for your enquiry. We will reply you at the provided email the soonest.');
});

Route::get('/contact-us', function() {
    return view('contact-us', [
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

// Route::get('/notifications', function() {
//     return view('notifications');
// });

Route::get('/faq', function() {
    return view('faq', [
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Route::get('/file-upload', function() {
    return view('file-upload');
});

Route::get('/projects/select-role', 'ProjectsController@selectRole');
Route::post('/projects/select-role', 'ProjectsController@selectRole');

Route::post('/settings', function(Request $request) {
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'password-current' => 'required',
        'password-new' => 'required',
        'password-new-confirm' => 'required'
    ]);


    if($validator->fails()) {
        return redirect('/settings')
                    ->withErrors($validator)
                    ->withInput();
    } else {
        $userdata = array(
            'email'     => $user->email,
            'password'  => Input::get('password-current')
        );

        if(Auth::attempt($userdata)) {
            $newPassword = Input::get('password-new');
            $newPasswordConfirm = Input::get('password-new-confirm');

            if($newPassword == $newPasswordConfirm) {
                $user->password = Hash::make($newPassword);
                $user->save();

                return redirect('settings')->with('success', 'Password updated.');;
            } else {
                return redirect('settings')->with('error', 'The new password and the new password confirmation do not match.');
            }
        } else {
            return redirect('settings')->with('error', 'The username and current password entered do not match.');
        }
    }
})->middleware('auth');

Route::get('/settings', function() {
    $user = Auth::user();

	return view('settings', [
		'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
	]);
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajaxRequest', 'HomeController@ajaxRequest');

Route::post('ajaxRequest', 'HomeController@ajaxRequestPost');

Route::get('/ola', function() {
    $pusher = App::make('pusher');

    $pusher->trigger('purchases_1', 'new-purchase', array('username' => 'Shazwi', 'message' => 'just purchased your project: blah blah'));
});

Route::get('/messages/{userId}/projects/{projectId}', 'MessagesController@showIndividualProjectChannel');

Route::get('/messages/{userId}', 'MessagesController@showIndividualChannel');

Route::get('/roles/{roleSlug}/projects/{projectSlug}/{userId}/review', 'ReviewsController@leaveReview');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/review', 'ReviewsController@leaveReview');

Route::post('/roles/{roleSlug}/projects/{projectSlug}/{userId}/review', 'ReviewsController@submitReview');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/review', 'ReviewsController@submitReview');


Route::post('/projects/publish-project', 'ProjectsController@publishProject');
Route::post('/projects/save-project', 'ProjectsController@saveProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/clone', 'ProjectsController@cloneProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/toggle-visibility-project', 'ProjectsController@toggleVisibilityProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/submit-project-attempt', 'ProjectsController@submitProjectAttempt');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/purchase-project', 'ProjectsController@purchaseProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/add-project-to-cart', 'ProjectsController@addProjectToCart');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/save-project', 'ProjectsController@saveChanges');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/edit', 'ProjectsController@edit')->middleware('auth');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/attempt', 'ProjectsController@attempt')->middleware('auth');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/{userId}', 'ProjectsController@submitReview')->middleware('auth');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/{userId}', 'ProjectsController@review')->middleware('auth');


Route::get('/roles/{roleSlug}/projects/{projectSlug}', 'ProjectsController@show');

    
Route::post('/notifications/notify', 'NotificationController@postNotify');
Route::resources([
    // 'companies' => 'CompaniesController',
    'opportunities' => 'OpportunitiesController',
    'roles' => 'RolesController',
    'messages' => 'MessagesController',
    'projects' => 'ProjectsController',
    'notifications' => 'NotificationController',
]);

Route::get('/templates/upload', 'TemplatesController@upload');
Route::get('/templates/{templateId}', 'TemplatesController@show');
Route::post('/templates/upload', 'TemplatesController@uploadFile');
Route::get('/templates', 'TemplatesController@index');

Route::get('/', function() {
	return view('index', [
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
