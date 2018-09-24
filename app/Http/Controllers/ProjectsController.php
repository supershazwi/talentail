<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Project;
use App\Skill;
use App\User;

use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($slug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $skill = Skill::select('id', 'title', 'slug')->where('slug', $routeParameters['skillSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['skill_id', '=', $skill->id]])->get()[0];
        
        return view('projects.show', [
            'project' => $project,
            'skill' => $skill
        ]);
    }

    public function edit($skillSlug, $projectSlug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $skill = Skill::select('id', 'title', 'slug')->where('slug', $routeParameters['skillSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['skill_id', '=', $skill->id]])->get()[0];

        return view('projects.edit', [
            'project' => $project,
            'skill' => $skill
        ]);
    }

    public function create() {
        // check whether or not the user is a creator
        $user = Auth::user();

        if($user->creator) {
            if(session('selectedSkill')) {
                $selectedSkill = Skill::find(session('selectedSkill')); 
            }

            return view('projects.create', [
                'selectedSkill' => $selectedSkill
            ]);
        } else {
            return view('projects.apply');
        }

    }

    public function selectSkill() {
        if(request('skill') != null) {
            $skillId = request('skill');
            session(['selectedSkill' => $skillId]);

            return redirect()->action('ProjectsController@create');
        }
        $skills = Skill::select('id', 'title')->orderBy('title', 'asc')->get();

        return view('projects.selectSkill', [
            'skills' => $skills
        ]);
    }

    public function store(Request $request) {

        // dd(request());

        // dd($request->file('file'));

        $request->file('file')->store('/assets', 'gcs');

        // $disk = Storage::disk('gcs');
        // $disk->put('/assets/1', $fileContents);

        // redirect('/file-upload');
    }
}
