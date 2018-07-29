<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

class TopicsController extends Controller
{
    public function index() {
        $topics = Topic::all();

    	return view('topics.index', [
            'topics' => $topics
        ]);
    }

    public function create() {
    	return view('topics.create');
    }

    public function store() {
    	$topic = new Topic;

    	$topic->title = request('title');
    	$topic->description = request('description');

    	$topic->save();

    	return redirect('/');
    }

    public function show() {
        return view('topics.show');
    }
}
