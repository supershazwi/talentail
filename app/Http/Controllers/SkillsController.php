<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Skill;
use App\Competency;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $skills = Skill::all();

    	return view('skills.index', [
            'skills' => $skills
        ]);
    }

    public function create() {
    	return view('skills.create');
    }

    public function store() {
    	$skill = new Skill;

    	$skill->title = request('title');
    	$skill->description = request('description');
        $skill->slug = str_slug(request('title'), '-');

    	$skill->save();

    	return redirect('/skills');
    }

    public function show($slug) {
        $skill = Skill::where('slug', $slug)->first();

        $competencies = Competency::where('skill_id', $skill->id)->get();

        return view('skills.show', [
            'skill' => $skill,
            'competencies' => $competencies
        ]);
    }
}
