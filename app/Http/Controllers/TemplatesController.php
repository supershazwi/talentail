<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Template;
use App\Competency;
use App\Message;

use Validator;

class TemplatesController extends Controller
{
    public function index() {
        $templates = Template::all();

    	return view('templates.index', [
            'templates' => $templates,
            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
        ]);
    }

    public function upload() {
    	if(Auth::user()->admin) {
	    	return view('templates.upload', [
	            'messageCount' => Message::where('recipient_id', Auth::id())->where('read', 0)->count(),
	        ]);
    	} else {
    		return redirect('templates');
    	}
    }

    public function uploadFile(Request $request) {
    	$validator = Validator::make($request->all(), [
    	    'title' => 'required',
    	    'description' => 'required',
    	    'file' => 'required'
    	]);

    	if($validator->fails()) {
    	    return redirect('templates/upload')
    	                ->withErrors($validator)
    	                ->withInput();
    	}

    	$template = new Template;

    	$template->title = $request->input('title');
    	$template->description = $request->input('description');
    	$template->url = $request->file('file')[0]->store('/assets', 'gcs');
    	$template->mime_type = $request->file('file')[0]->getMimeType();
    	$template->size = $request->file('file')[0]->getSize();

    	$template->save();

    	return redirect('templates');
    }
}
