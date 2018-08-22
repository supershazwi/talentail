<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competency;
use App\Skill;

class CompetenciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $skills = Skill::all();

        return view('competencies.index', [
            'skills' => $skills
        ]);
    }

    public function create() {
    	return view('competencies.create');
    }

    public function store() {
    	$competency = new Competency;

    	$competency->title = request('title');
    	$competency->skill_id = "xxx";

    	$competency->save();

    	return redirect('/competencies');
    }
}
