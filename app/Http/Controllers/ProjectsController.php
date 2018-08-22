<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Project;
use App\Skill;
use App\User;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($slug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $skill = Skill::select('id', 'title')->where('slug', $routeParameters['skillSlug'])->get()[0];
        
        return view('projects.show', [
            'project' => Project::where([
                ['slug', '=', $routeParameters['projectSlug']],
                ['skill_id', '=', $skill->id]
            ])->get()[0],
            'skill' => $skill
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
