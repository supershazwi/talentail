<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Competency;
use App\Role;
use App\Message;


class CompetenciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $roles = Role::all();

        return view('competencies.index', [
            'roles' => $roles,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }

    public function create() {
    	return view('competencies.create', [
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }

    public function store() {
    	$competency = new Competency;

    	$competency->title = request('title');
    	$competency->skill_id = "xxx";

    	$competency->save();

    	return redirect('/competencies');
    }
}
