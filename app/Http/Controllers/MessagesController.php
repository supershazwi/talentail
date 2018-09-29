<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Message;
use App\User;

class MessagesController extends Controller
{
    var $pusher;
    var $user;
    var $messageChannel;

    const DEFAULT_message_CHANNEL = 'message';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pusher = App::make('pusher');
        $this->user = Auth::user();
        $this->messageChannel = self::DEFAULT_message_CHANNEL;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!Auth::user())
        // {
        //     return redirect('/login');
        // }

        // return view('messages.show', ['messageChannel' => $this->messageChannel]);

        $messages = Message::where('recipient_id', Auth::id())->orWhere('sender_id', Auth::id())->get();

        // i need to loop through the messages to sift out users that i need to display at the right hand side

        $loggedInUserId = Auth::id();

        $allUsersIdArray = array();

        foreach($messages as $message) {
            if(!in_array($message->recipient_id, $allUsersIdArray) && $message->recipient_id != $loggedInUserId) {
                array_push($allUsersIdArray, $message->recipient_id);
            } 
            if(!in_array($message->sender_id, $allUsersIdArray) && $message->sender_id != $loggedInUserId) {
                array_push($allUsersIdArray, $message->sender_id);
            } 
        }

        $users = User::find($allUsersIdArray);

        return view('messages.index', [
            'users' => $users,
            'messages' => null
        ]);
    }

    public function showIndividualChannel() {
        $routeParameters = Route::getCurrentRoute()->parameters();

        $messages = Message::where('recipient_id', Auth::id())->orWhere('sender_id', Auth::id())->get();

        // i need to loop through the messages to sift out users that i need to display at the right hand side

        $loggedInUserId = Auth::id();

        $allUsersIdArray = array();

        foreach($messages as $message) {
            if(!in_array($message->recipient_id, $allUsersIdArray) && $message->recipient_id != $loggedInUserId) {
                array_push($allUsersIdArray, $message->recipient_id);
            } 
            if(!in_array($message->sender_id, $allUsersIdArray) && $message->sender_id != $loggedInUserId) {
                array_push($allUsersIdArray, $message->sender_id);
            } 
        }

        $users = User::find($allUsersIdArray);

        $clickedUserId = $routeParameters['userId'];

        $messages1 = Message::where('sender_id', $loggedInUserId)->where('recipient_id', $clickedUserId)->get();
        $messages2 = Message::where('sender_id', $clickedUserId)->where('recipient_id', $loggedInUserId)->get();
        $messages3 = $messages1->merge($messages2);

        $messages3 = $messages3->sortByDesc('created_at');

        return view('messages.index', [
            'users' => $users,
            'messages' => $messages3,
            'messageChannel' => self::DEFAULT_message_CHANNEL
        ]);
    }

    public function sendMessage(Request $request)
    {
        $message = [
            'text' => e($request->input('message_text')),
            'username' => Auth::user()->name,
            'avatar' => Auth::user()->avatar,
            'timestamp' => (time()*1000)
        ];
        $this->pusher->trigger($this->messageChannel, 'new-message', $message);
    }

    public function testMessage(Request $request) {
        $this->pusher->trigger($this->messageChannel, 'new-message', 'hello');
    }
}
