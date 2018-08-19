<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Project;
use App\Topic;
use App\User;

class ProjectsController extends Controller
{
    public function show($slug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $topic = Topic::select('id', 'title')->where('slug', $routeParameters['topicSlug'])->get()[0];
        
        return view('projects.show', [
            'project' => Project::where([
                ['slug', '=', $routeParameters['projectSlug']],
                ['topic_id', '=', $topic->id]
            ])->get()[0],
            'topic' => $topic
        ]);
    }

    public function create() {
        // check whether or not the user is a creator
        $user = Auth::user();

        if($user->creator) {
            return view('projects.create');
        } else {
            return view('projects.apply');
        }

    }
}
