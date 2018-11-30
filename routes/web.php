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
use App\Credit;
use App\Company;
use App\Notification;
use App\Role;
use App\Project;
use App\Review;
use App\RoleGained;
use App\ShoppingCart;
use App\Portfolio;
use App\ShoppingCartLineItem;
use App\Message;
use App\ContactMessage;
use App\Referral;
use App\CreatorApplication;
use App\CompanyApplication;
use App\CreatorApplicationFile;
use App\AttemptedProject;

use Pusher\Laravel\Facades\Pusher;

use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

Route::get('/referrals', function() {
    $referred = Referral::where('referrer_id', Auth::id())->get();

    return view('referrals.index', [
        'referred' => $referred,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/credits/add', function() {
    return view('credits.add', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::post('/companies/apply', function(Request $request) {
    // check whether or not both select box and input field selected


    $errorArray = array();

    if($request->input('description') == null) {
        array_push($errorArray, "Please provide a description of the role you play at your company.");
    }

    if($request->input('company') == "Nil" && $request->input('title') == null) {
        array_push($errorArray, "Please provide a valid company that you belong to.");
    }

    if($request->input('company') != "Nil" && $request->input('title')) {
        array_push($errorArray, "You should either select a company from the provided list or provide one that isn't found in the provided list.");
    }

    if(sizeof($errorArray) > 0) {
        return redirect("/company-application")->with('error', $errorArray)->withInput();
    } else {
        $companyApplication = new CompanyApplication;
        $companyApplication->description = $request->input('description');
        $companyApplication->user_id = Auth::id();
        $companyApplication->status = "pending";

        // check if new company

        if($request->input('title')) {
            $company = new Company;
            $company->title = $request->input('title');
            $company->save();
            $companyApplication->company_id = $company->id;
        } else {
            $companyApplication->company_id = $request->input('company');
        }

        $companyApplication->save();

        return redirect('/company-application-status')->with('success', 'Your application has been submitted. We will get back to you shortly.');
    }
});

Route::post('/credits/add-credits-to-cart', function(Request $request) {
    $creditType = $request->input('type');

    $credit = Credit::where('type', $creditType)->first();

    $shoppingCart = ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first();

    if($shoppingCart) {
        // already has a shopping cart
    } else {
        // no shopping cart, create new one

        $shoppingCart = new ShoppingCart;

        $shoppingCart->status = "pending";
        $shoppingCart->total = 0;
        $shoppingCart->no_of_items = 0;
        $shoppingCart->user_id = Auth::id();
    }

    $shoppingCart->no_of_items = $shoppingCart->no_of_items + 1;
    $shoppingCart->total = $shoppingCart->total + $credit->amount;

    $shoppingCart->save();

    $shoppingCartLineItem = new ShoppingCartLineItem;

    $shoppingCartLineItem->credit_id = $credit->id;
    $shoppingCartLineItem->shopping_cart_id = $shoppingCart->id;

    $shoppingCartLineItem->save();

    return redirect('/credits/add')->with('success', 'Credits added to cart.');
});

Route::get('/credits', function() {
    return view('credits.index', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::post('/work-experience', function(Request $request) {
    $user = Auth::user();

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

    return redirect('/work-experience');
});

Route::post('/portfolios/{id}/add-portfolio-to-cart', function(Request $request) {
    $routeParameters = Route::getCurrentRoute()->parameters();
    $portfolio = Portfolio::find($request->input('portfolio_id'));

    // find whether or not there is an existing shopping cart
    $shoppingCart = ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first();

    if($shoppingCart) {
        // already has a shopping cart
    } else {
        // no shopping cart, create new one

        $shoppingCart = new ShoppingCart;

        $shoppingCart->status = "pending";
        $shoppingCart->total = 0;
        $shoppingCart->no_of_items = 0;
        $shoppingCart->user_id = Auth::id();
    }

    $shoppingCart->no_of_items = $shoppingCart->no_of_items + 1;
    $shoppingCart->total = $shoppingCart->total + 25;

    $shoppingCart->save();

    $shoppingCartLineItem = new ShoppingCartLineItem;

    $shoppingCartLineItem->portfolio_id = $portfolio->id;
    $shoppingCartLineItem->shopping_cart_id = $shoppingCart->id;

    $shoppingCartLineItem->save();

    return redirect('/portfolios/'.$routeParameters['id']);
});

Route::get('/portfolios/{id}', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $portfolio = Portfolio::find($routeParameters['id']);

    $shoppingCart = ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first();
    if($shoppingCart) {
        $addedToCart = ShoppingCartLineItem::where('portfolio_id', $portfolio->id)->where('shopping_cart_id', $shoppingCart->id)->first();
    } else {
        $addedToCart = null;
    }

    return view('portfolios.show', [
        'addedToCart' => $addedToCart,
        'portfolio' => $portfolio,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/explore', function() {
    $portfolios = Portfolio::all();

    return view('portfolios.index', [
        'portfolios' => $portfolios,
        'parameter' => 'portfolio',
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/welcome', function() {

    return view('welcome');
});

Route::get('/work-experience', function() {
    $user = Auth::user();

    return view('workExperience', [
        
        'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/created-projects', function() {
    return view('createdProjects', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('dashboard', function() {
    return view('dashboard', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/portfolio', function() {
    return view('portfolio', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
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
        if($shoppingCartLineItem->project_id) {
            $shoppingCart->total = $shoppingCart->total + $shoppingCartLineItem->project->amount;
        } elseif($shoppingCartLineItem->credit_id) {
            $shoppingCart->total = $shoppingCart->total + $shoppingCartLineItem->credit->amount;
        }
    }

    $shoppingCart->save();

    return redirect('/shopping-cart');
});

Route::get('/invoices/{invoiceId}', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $invoice = ShoppingCart::find($routeParameters['invoiceId']);

    return view('invoices.show', [
        
        'invoice' => $invoice,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending'
    ]);
});


Route::get('/invoices', function() {
    $invoices = ShoppingCart::where('user_id', Auth::id())->where('status', 'paid')->get();

    return view('invoices.index', [
        
        'invoices' => $invoices,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending'
    ]);
});

Route::get('/shopping-cart', function() {
    $shoppingCart = ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first();

    $projectsArray = array();
    $lessonsArray = array();
    $interviewsArray = array();
    $creditsArray = array();

    if($shoppingCart) {
        foreach($shoppingCart->shopping_cart_line_items as $shoppingCartLineItem) {
            if($shoppingCartLineItem->project_id) {
                array_push($projectsArray, $shoppingCartLineItem->project_id);
            }

            if($shoppingCartLineItem->lesson_id) {
                array_push($lessonsArray, $shoppingCartLineItem->lesson_id);
            }

            if($shoppingCartLineItem->interview_id) {
                array_push($interviewsArray, $shoppingCartLineItem->interview_id);
            }

            if($shoppingCartLineItem->credit_id) {
                array_push($creditsArray, $shoppingCartLineItem->credit_id);
            }
        }
    }

    return view('shoppingCart', [
        
        'shoppingCart' => $shoppingCart,
        'projectsArray' => implode(",", $projectsArray),
        'lessonsArray' => implode(",", $lessonsArray),
        'creditsArray' => implode(",", $creditsArray),
        'interviewsArray' => implode(",", $interviewsArray),
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');;

Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');

Route::get('tutorials/create-projects', function() {
    return view('tutorials.create-projects',[
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('tutorials/attempt-projects', function() {
    return view('tutorials.attempt-projects',[
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('tutorials', function() {
    return view('tutorials.index',[
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('privacy-policy', function() {
    return view('privacy',[
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('terms-and-conditions', function() {
    return view('terms', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
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
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::post('/purchase-projects', 'ProjectsController@purchaseProjects');

Route::get('/creators', function() {
    $creators = User::where('creator', 1)->get();

    return view('creators.index', [
        
        'creators' => $creators,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
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
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/profile/{userId}/reviews', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $user = User::find($routeParameters['userId']);

    return view('profile.reviews', [
        'showMessage' => true,
        'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/profile/{userId}/projects', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $user = User::find($routeParameters['userId']);

    $projects = Project::where('user_id', $user->id)->get();

    return view('profile.projects', [
        'showMessage' => true,
        'user' => $user,
        'projects' => $projects,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/profile/reviews', function() {
    $user = Auth::user();

    return view('profile.reviews', [
        'showMessage' => false,
        'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/profile/interviews', function() {
    $user = Auth::user();

    return view('profile.interviews', [
        
        'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/profile/lessons', function() {
    $user = Auth::user();

    return view('profile.lessons', [
        
        'user' => $user,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/profile/projects', function() {
    $user = Auth::user();

    // find out skills gained
    $projects = Project::where('user_id', Auth::id())->get();

    return view('profile.projects', [
        'showMessage' => false,
        'user' => $user,
        'parameter' => 'project',
        'projects' => $projects,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

// Route::get('/profile/{userId}', function() {
//     $routeParameters = Route::getCurrentRoute()->parameters();

//     $user = User::find($routeParameters['userId']);

//     return view('profile', [
//         'user' => $user,
//         'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        // 'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
//     ]);
// })->middleware('auth');

Route::get('/profile/{profileId}', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $loggedInUserId = Auth::id();

    $clickedUserId = $routeParameters['profileId'];

    if($loggedInUserId == $clickedUserId) {
        return redirect('/profile');
    } else {
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
            'showMessage' => true,
            'rolesGained' => $rolesGained,
            'messages' => $messages3,
            'clickedUserId' => $clickedUserId,
            'attemptedProjects' => $attemptedProjects,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
            'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
            'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
            'messageChannel' => 'messages_'.$subscribeString,
        ]);
    }
});

Route::get('/projects-overview', function() {
    if(Auth::user()->creator) {
       $projects = Project::where('user_id', Auth::id())->get();

       return view('projects.overview', [
           
           'projects' => $projects,
           'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
           'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
           'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
       ]); 
   } else {
    return redirect('/projects-overview/attempted');
   }
    
})->middleware('auth');

Route::get('/projects-overview/attempted', function() {
    $attemptedProjects = AttemptedProject::where('user_id', Auth::id())->get();

    return view('projects.attempted', [
        
        'attemptedProjects' => $attemptedProjects,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('projects/clone', function() {
    if(session('selectedRole')) {
        $selectedRole = Role::find(session('selectedRole')); 
    }

    return view('projects.clone', [
        
        'sampleProjects' => Project::where('sample', 1)->get(),
        'createdProjects' => Project::where('user_id', Auth::id())->get(),
        'selectedRole' => $selectedRole,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::post("/company-applications/update-status", function(Request $request) {
    $companyApplication = CompanyApplication::find($request->input('company_application_id'));

    $companyApplication->status = $request->input('status');

    $companyApplication->save();

    if($request->input('status') == "approved") {
        $user = User::find($companyApplication->user_id);

        $user->company = true;

        $user->save();
    }

    return redirect("/creator-application-overview");
});

Route::post("/creator-applications/update-status", function(Request $request) {
    $creatorApplication = CreatorApplication::find($request->input('creator_application_id'));

    $creatorApplication->status = $request->input('status');

    $creatorApplication->save();

    if($request->input('status') == "approved") {
        $user = User::find($creatorApplication->user_id);

        $user->creator = true;

        $user->save();
    }

    return redirect("/creator-application-overview");
});

Route::get('/creator-application-status', function() {
    $creatorApplication = CreatorApplication::where('user_id', Auth::id())->first();

    return view('creator-application-status', [
        'creatorApplication' => $creatorApplication,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/company-application-status', function() {
    $companyApplication = CompanyApplication::where('user_id', Auth::id())->first();

    return view('company-application-status', [
        'companyApplication' => $companyApplication,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/company-applications/{userId}', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $companyApplication = CompanyApplication::where('user_id', $routeParameters['userId'])->first();

    return view('company-application-show', [
        'companyApplication' => $companyApplication,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/creator-applications/{userId}', function() {
    $routeParameters = Route::getCurrentRoute()->parameters();

    $creatorApplication = CreatorApplication::where('user_id', $routeParameters['userId'])->first();

    return view('creator-application-show', [
        'creatorApplication' => $creatorApplication,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/creator-application-overview', function() {
    $creatorApplications = CreatorApplication::all();

    return view('creator-application-overview', [
        'creatorApplications' => $creatorApplications,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/company-application-overview', function() {
    $companyApplications = CompanyApplication::all();

    return view('company-application-overview', [
        'companyApplications' => $companyApplications,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/company-application', function() {
    $companies = Company::all();

    return view('apply-company', [
        
        'companies' => $companies,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/creator-application', function() {
    return view('apply-creator', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::post('/projects/apply', function(Request $request) {
    $creatorApplication = new CreatorApplication;

    $creatorApplication->description = $request->input('description');
    $creatorApplication->user_id = Auth::id();
    $creatorApplication->status = "pending";

    $creatorApplication->save();

    if($request->file('file-1')) {

        for($fileCounter = 0; $fileCounter < count($request->file('file-1')); $fileCounter++) {

            $creatorApplicationFile = new CreatorApplicationFile;

            $creatorApplicationFile->title = $request->file('file-1')[$fileCounter]->getClientOriginalName();
            $creatorApplicationFile->url = Storage::disk('gcs')->put('/assets', $request->file('file-1')[$fileCounter], 'public');
            $creatorApplicationFile->mime_type = $request->file('file-1')[$fileCounter]->getMimeType();
            $creatorApplicationFile->creator_application_id = $creatorApplication->id;

            $creatorApplicationFile->save();
        }
    }

    return redirect('/creator-application')->with('success', 'Your application has been submitted. We will get back to you shortly.');
});

Route::get('/attempt/others', function() {
    $role = Role::where('slug', 'others')->first();

    return view('attempt.others', [
        
        'role' => $role,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/discover', function() {
    $role = Role::where('slug', 'business-analyst')->first();

    return view('attempt.index', [
        
        'parameter' => 'discover',
        'role' => $role,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/learn', function() {
    // $role = Role::where('slug', 'business-analyst')->first();

    return view('learn.index', [
        
        'parameter' => 'learn',
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});


Route::post('/profile/save', function(Request $request) {

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required'
    ]);

    if($validator->fails()) {
        return redirect('/settings')
                    ->withErrors($validator)
                    ->withInput();
    } else {
        $user = Auth::user();

        if (Input::has('name')) { $user->name = Input::get('name'); }
        if (Input::has('email')) { $user->email = Input::get('email'); }
        if (Input::has('website')) { $user->website = Input::get('website'); }
        if (Input::has('facebook')) { $user->facebook = Input::get('facebook'); }
        if (Input::has('linkedin')) { $user->linkedin = Input::get('linkedin'); }
        if (Input::has('twitter')) { $user->twitter = Input::get('twitter'); }
        if (Input::has('description')) { $user->description = Input::get('description'); }
        if (Input::has('avatar-file')) {
            // $user->avatar = $request->file('avatar-file')->store('/assets', 'gcs');
            $user->avatar = Storage::disk('gcs')->put('/avatars', $request->file('avatar-file'), 'public');
        }

        $user->save();

        return redirect('/settings')->with('success', 'Password updated.');;
    }
})->middleware('auth');

Route::get('/profile', function() {
    $user = Auth::user();

    // find out skills gained
    $rolesGained = RoleGained::where('user_id', Auth::id())->get();
    $attemptedProjects = AttemptedProject::where('user_id', Auth::id())->get();

	return view('profile', [
        'user' => $user,
        'showMessage' => false,
        'rolesGained' => $rolesGained,
        'attemptedProjects' => $attemptedProjects,
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/about-us', function() {
    return view('about-us', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
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
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

// Route::get('/notifications', function() {
//     return view('notifications');
// });

Route::get('/faq', function() {
    return view('faq', [
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
});

Route::get('/file-upload', function() {
    return view('file-upload');
});

Route::get('/projects/select-role', 'ProjectsController@selectRole');
Route::post('/projects/select-role', 'ProjectsController@selectRole');

Route::post('/settings/authentication', function(Request $request) {
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'password-current' => 'required',
        'password-new' => 'required',
        'password-new-confirm' => 'required'
    ]);


    if($validator->fails()) {
        return redirect('/settings/authentication')
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

                return redirect('settings/authentication')->with('success', 'Password updated.');
            } else {
                return redirect('settings/authentication')->with('error', 'The new password and the new password confirmation do not match.');
            }
        } else {
            return redirect('settings/authentication')->with('error', 'The username and current password entered do not match.');
        }
    }
})->middleware('auth');

Route::get('/settings/authentication', function() {
    $user = Auth::user();

    return view('settings.authentication', [
        'user' => $user,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
    ]);
})->middleware('auth');

Route::get('/settings', function() {
    $user = Auth::user();

	return view('settings.profile', [
		'user' => $user,
        
        'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
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

Route::get('/roles/{roleSlug}/projects/{projectSlug}/tasks', 'ProjectsController@showTasks');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/files', 'ProjectsController@showFiles');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/competencies', 'ProjectsController@showCompetencies');

Route::post('/projects/publish-project', 'ProjectsController@publishProject');
Route::post('/projects/save-project', 'ProjectsController@saveProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/clone', 'ProjectsController@cloneProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/toggle-visibility-project', 'ProjectsController@toggleVisibilityProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/submit-project-attempt', 'ProjectsController@submitProjectAttempt');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/purchase-project', 'ProjectsController@purchaseProject');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/add-project-to-cart', 'ProjectsController@addProjectToCart')->middleware('auth');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/save-project', 'ProjectsController@saveChanges');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/edit', 'ProjectsController@edit')->middleware('auth');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/attempt', 'ProjectsController@attempt')->middleware('auth');
Route::post('/roles/{roleSlug}/projects/{projectSlug}/{userId}', 'ProjectsController@submitReview')->middleware('auth');


Route::get('/roles/{roleSlug}/projects/{projectSlug}/{userId}/tasks', 'ProjectsController@reviewTasks')->middleware('auth');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/{userId}/files', 'ProjectsController@reviewFiles')->middleware('auth');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/{userId}/competencies', 'ProjectsController@reviewCompetencies')->middleware('auth');
Route::get('/roles/{roleSlug}/projects/{projectSlug}/{userId}', 'ProjectsController@review')->middleware('auth');


Route::get('/roles/{roleSlug}/projects/{projectSlug}', 'ProjectsController@show');

    
Route::post('/notifications/notify', 'NotificationController@postNotify');
Route::resources([
    'companies' => 'CompaniesController',
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
            
            'parameter' => 'index',
            'parameter' => 'none',
            'shoppingCartActive' => ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->first()['status']=='pending',
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
            'notificationCount' => Notification::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
