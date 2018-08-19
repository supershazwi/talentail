<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Message;

class MessagesController extends Controller
{
    public function index() {
        $messages = Message::all();

        return view('messages.index', [
            'messages' => $messages
        ]);
    }
}
