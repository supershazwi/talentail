<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Opportunity;
use App\Role;
use App\Company;
use App\Message;


class OpportunitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $roles = Role::select('id', 'title')->orderBy('title', 'asc')->get();
        $companies = Company::select('id', 'title')->orderBy('title', 'asc')->get();

        return view('opportunities.create', [
            'roles' => $roles,
            'companies' => $companies,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }

    public function store() {
    	$opportunity = new Opportunity;

    	$opportunity->title = request('title');
    	$opportunity->description = request('description');
        $opportunity->role_id = request('role_id');
        $opportunity->company_id = request('company_id');

        $company = Company::select('title')->where('id', request('company_id'))->first();

        $opportunity->slug = strtolower($company->title) . '-' . str_slug(request('title'), '-');

    	$opportunity->save();

    	return redirect('/');
    }

    public function show($slug) {
        $opportunity = Opportunity::where('slug', $slug)->first();

        return view('opportunities.show', [
            'opportunity' => $opportunity,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }
}
