<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Company;
use App\Message;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $companies = Company::all();

    	return view('companies.index', [
            'companies' => $companies,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }

    public function create() {
    	return view('companies.create', [
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }

    public function store() {
    	$company = new Company;

    	$company->title = request('title');
    	$company->description = request('description');
        $company->website = request('website');
        $company->facebook = request('facebook');
        $company->twitter = request('twitter');
        $company->linkedin = request('linkedin');
        $company->email = request('email');
        $company->avatar = request('avatar');
        $company->slug = str_slug(request('title'), '-');

    	$company->save();

    	return redirect('/companies');
    }

    public function show($slug) {
        $company = Company::where('slug', $slug)->first();

        return view('companies.show', [
            'company' => $company,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }
}
