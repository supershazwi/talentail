<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\UseCase;
use App\Topic;

class UseCasesController extends Controller
{
    public function show($slug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $topic = Topic::select('id', 'title')->where('slug', $routeParameters['topicSlug'])->get()[0];
        
        return view('useCases.show', [
            'useCase' => UseCase::where([
                ['slug', '=', $routeParameters['useCaseSlug']],
                ['topic_id', '=', $topic->id]
            ])->get()[0],
            'topic' => $topic
        ]);
    }
}
