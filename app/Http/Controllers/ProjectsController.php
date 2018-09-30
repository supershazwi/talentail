<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Project;
use App\Task;
use App\Answer;
use App\ProjectFile;
use App\Skill;
use App\Competency;
use App\Message;
use App\User;

use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function show($slug) {

        $loggedInUserId = Auth::id();

        $routeParameters = Route::getCurrentRoute()->parameters();
        $skill = Skill::select('id', 'title', 'slug')->where('slug', $routeParameters['skillSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['skill_id', '=', $skill->id]])->get()[0];

        $clickedUserId = $project->user_id;

        $subscribeString;

        if($loggedInUserId < $clickedUserId) {
            $subscribeString = $loggedInUserId . "_" . $clickedUserId;
        } else {
            $subscribeString = $clickedUserId . "_" . $loggedInUserId;   
        }

        $messages1 = Message::where('sender_id', $loggedInUserId)->where('recipient_id', $clickedUserId)->where('project_id', $project->id)->get();
        $messages2 = Message::where('sender_id', $clickedUserId)->where('recipient_id', $loggedInUserId)->where('project_id', $project->id)->get();
        $messages3 = $messages1->merge($messages2);

        $messages3 = $messages3->sortBy('created_at');

        return view('projects.show', [
            'project' => $project,
            'skill' => $skill,
            'messages' => $messages3,
            'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
            'clickedUserId' => $clickedUserId
        ]);
    }

    public function edit($skillSlug, $projectSlug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $skill = Skill::select('id', 'title', 'slug', 'description')->where('slug', $routeParameters['skillSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['skill_id', '=', $skill->id]])->get()[0];

        $competencyIdArray = $project->competencies->toArray();
        foreach($competencyIdArray as $key=>$competencyArray) {
            $competencyIdArray[$key] = $competencyArray['id'];
        }

        return view('projects.edit', [
            'project' => $project,
            'skill' => $skill,
            'competencyIdArray' => $competencyIdArray
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

        $project = new Project;

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->brief = $request->input('brief');
        $project->slug = str_slug($request->input('title'), '-');
        $project->skill_id = session('selectedSkill');
        $project->user_id = Auth::id();
        $project->hours = $request->input('hours');
        $project->amount = $request->input('price');
        $project->published = true;

        $project->save();

        $competencies = Competency::find($request->input('competency'));
        $project->competencies()->attach($competencies);

        $taskCounter = 1;
        while($request->input('todo-title_'.$taskCounter) != null || $request->input('todo-description_'.$taskCounter) != null || $request->input('todo_'.$taskCounter) != null) {

            $task = new Task;

            $task->title = $request->input('todo-title_'.$taskCounter);
            $task->description = $request->input('todo-description_'.$taskCounter);

            if($request->input('todo_'.$taskCounter) == "mcq") {
                $task->mcq = true;
            } else if($request->input('todo_'.$taskCounter) == "open-ended") {
                $task->open_ended = true;
            } else if($request->input('todo_'.$taskCounter) == "na") {
                $task->na = true;
            }

            if($request->input('checkbox-file-upload_'.$taskCounter) != null) {
                $task->file_upload = true;
            }

            if($request->input('checkbox-multiple-select_'.$taskCounter) != null) {
                $task->multiple_select = true;
            }

            $task->project_id = $project->id;

            $task->save();

            if($request->input('todo_'.$taskCounter) == 'mcq') {
                $answerCounter = 1;

                while($request->input('answer_'.$taskCounter.'_'.$answerCounter) != null) {
                    $answer = new Answer;

                    $answer->title = $request->input('answer_'.$taskCounter.'_'.$answerCounter);
                    $answer->task_id = $task->id;

                    $answer->save();

                    $answerCounter++;
                }
            }

            $taskCounter++;
        }

        if($request->file('file-1')) {
            for($fileCounter = 0; $fileCounter < count($request->file('file-1')); $fileCounter++) {

                $projectFile = new ProjectFile;

                $projectFile->title = $request->file('file-1')[$fileCounter]->getClientOriginalName();
                $projectFile->size = $request->file('file-1')[$fileCounter]->getSize();
                $projectFile->url = $request->file('file-1')[$fileCounter]->store('/assets', 'gcs');
                $projectFile->mime_type = $request->file('file-1')[$fileCounter]->getMimeType();
                $projectFile->project_id = $project->id;

                $projectFile->save();
            }
        }

        $skillSlug = Skill::find(session('selectedSkill'))->slug;

        return redirect()->action('ProjectsController@show', ['skillSlug' => $skillSlug, 'projectSlug' => $project->slug]);
    }

    public function saveChanges(Request $request) {
        $project = Project::find($request->input('id'));
        
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->brief = $request->input('brief');
        $project->slug = str_slug($request->input('title'), '-');
        $project->user_id = Auth::id();
        $project->hours = $request->input('hours');
        $project->amount = $request->input('price');

        // detach all competencies so that i can reattach the new ones
        $project->competencies()->detach();
        $competencies = Competency::find($request->input('competency'));
        $project->competencies()->attach($competencies);

        $project->save();

        // remove tasks if any
        $removedTasksIdArray = $request->input('tasks-deleted');

        if($removedTasksIdArray != null) {
            $removedTasksIdArray = explode(",",$removedTasksIdArray);
            foreach($removedTasksIdArray as $removedTaskId) {
                Task::destroy($removedTaskId);
                Answer::where('task_id', $removedTaskId)->delete();
            }
        }

        // go through each task so that the updated ones are in
        $taskCounter = 1;
        while($request->input('todo-title_'.$taskCounter) != null || $request->input('todo-description_'.$taskCounter) != null || $request->input('todo_'.$taskCounter) != null) {

            // need to check the remaining tasks
            // some are existing tasks that we do not want to change its id
            // some are new tasks that need to be saved

            // this is to check whether or not there is an existing id
            if($request->input('task-id_'.$taskCounter)) {
                // this means that this task exists
                // need to update
                $task = Task::find($request->input('task-id_'.$taskCounter));
            } else {
                $task = new Task;
            }

            $task->title = $request->input('todo-title_'.$taskCounter);
            $task->description = $request->input('todo-description_'.$taskCounter);

            if($request->input('todo_'.$taskCounter) == "mcq") {
                $task->mcq = true;
                $task->open_ended = false;
                $task->na = false;
            } else if($request->input('todo_'.$taskCounter) == "open-ended") {
                $task->open_ended = true;
                $task->mcq = false;
                $task->na = false;
            } else if($request->input('todo_'.$taskCounter) == "na") {
                $task->na = true;
                $task->mcq = false;
                $task->open_ended = false;
            }

            if($request->input('checkbox-file-upload_'.$taskCounter) != null) {
                $task->file_upload = true;
            } else {
                $task->file_upload = false;
            }

            if($request->input('checkbox-multiple-select_'.$taskCounter) != null) {
                $task->multiple_select = true;
            } else {
                $task->multiple_select = false;
            }

            $task->project_id = $project->id;

            $task->save();

            // remove answers if any
            $removedAnswersIdArray = $request->input('answers-deleted');

            if($removedAnswersIdArray != null) {
                $removedAnswersIdArray = explode(",",$removedAnswersIdArray);
                foreach($removedAnswersIdArray as $removedAnswerId) {
                    Answer::destroy($removedAnswerId);
                }
            }

            // add answers if any
            if($request->input('todo_'.$taskCounter) == 'mcq') {
                // need to check whether the answer we are looping already exist
                // get the id, if there is, that means answer exist, so just update
                // if no id, create new answer

                $answerCounter = 1;
                
                while($request->input('answer_'.$taskCounter.'_'.$answerCounter) != null) {

                    if($request->input('deleted-answer-id_'.$taskCounter.'_'.$answerCounter) != null) {
                        $answer = Answer::find($request->input('deleted-answer-id_'.$taskCounter.'_'.$answerCounter));
                    } else {
                        $answer = new Answer;
                    }

                    $answer->title = $request->input('answer_'.$taskCounter.'_'.$answerCounter);
                    $answer->task_id = $task->id;

                    $answer->save();

                    $answerCounter++;
                }
            }

            $taskCounter++;
        }

        // dissociate all removed files
        $removedFilesIdArray = $request->input('files-deleted');

        if($removedFilesIdArray != null) {
            $removedFilesIdArray = explode(",",$removedFilesIdArray);
            foreach($removedFilesIdArray as $removedFileId) {
                ProjectFile::destroy($removedFileId);
            }
        }

        if($request->file('file-1')) {
            for($fileCounter = 0; $fileCounter < count($request->file('file-1')); $fileCounter++) {

                $projectFile = new ProjectFile;

                $projectFile->title = $request->file('file-1')[$fileCounter]->getClientOriginalName();
                $projectFile->size = $request->file('file-1')[$fileCounter]->getSize();
                $projectFile->url = $request->file('file-1')[$fileCounter]->store('/assets', 'gcs');
                $projectFile->mime_type = $request->file('file-1')[$fileCounter]->getMimeType();
                $projectFile->project_id = $project->id;

                $projectFile->save();
            }
        }

        $skillSlug = Skill::find($project->skill_id)->slug;

        return redirect('/skills/'.$skillSlug.'/projects/'.$project->slug);
    }
}
