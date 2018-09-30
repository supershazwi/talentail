<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use App\Notification;

class NotificationController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // to show a view that lets a user send a notification
    public function index()
    {
        $notifications = Notification::where('recipient_id', Auth::id())->get();
        
        return view('notifications', [
            'notifications' => $notifications,
        ]);
    }

    // to handle a notification request and trigger the notification event
    public function postNotify(Request $request)
    {
        $notifyText = e($request->input('notify_text'));

        // TODO: Get Pusher instance from service container
        $pusher = App::make('pusher');

        // TODO: The notification event data should have a property named 'text'
        $message = array('message' => 'hello thambi');

        // TODO: On the 'notifications' channel trigger a 'new-notification' event
        $pusher->trigger('notifications', 'new-notification', $message);
    }
}
