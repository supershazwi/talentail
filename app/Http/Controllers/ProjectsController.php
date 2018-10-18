<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

use App\Project;
use App\AttemptedProject;
use App\AnsweredTask;
use App\AnsweredTaskFile;
use App\Task;
use App\Answer;
use App\ProjectFile;
use App\Role;
use App\RoleGained;
use App\Competency;
use App\CompetencyScore;
use App\Message;
use App\User;
use App\Notification;
use App\ReviewedAnsweredTaskFile;

use Validator;

use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    var $pusher;
    var $user;
    var $messageChannel;

    const DEFAULT_message_CHANNEL = 'message';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pusher = App::make('pusher');
        $this->user = Auth::user();
        $this->messageChannel = self::DEFAULT_message_CHANNEL;
    }

    public function submitReview(Request $request) {
        $loggedInUserId = Auth::id();

        $routeParameters = Route::getCurrentRoute()->parameters();
        $role = Role::select('id', 'title', 'slug')->where('slug', $routeParameters['roleSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['role_id', '=', $role->id]])->get()[0];

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

        $answeredTasks = AnsweredTask::where('project_id', $project->id)->where('user_id', $routeParameters['userId'])->orderBy('task_id', 'asc')->get();

        $answeredTasksArray = $answeredTasks->toArray();

        foreach($answeredTasksArray as $key=>$answeredTask) {
            $answeredTaskToReview = AnsweredTask::find($answeredTask['id']);

            $answeredTaskToReview->response = $request->input("response_" . $answeredTask['id']);
            $answeredTaskToReview->save();

            if($request->file('file_' . $answeredTask['id'])) {
                for($fileCounter = 0; $fileCounter < count($request->file('file_' . $answeredTask['id'])); $fileCounter++) {

                    $reviewedAnsweredTaskFile = new ReviewedAnsweredTaskFile;

                    $reviewedAnsweredTaskFile->title = $request->file('file_' . $answeredTask['id'])[$fileCounter]->getClientOriginalName();
                    $reviewedAnsweredTaskFile->size = $request->file('file_' . $answeredTask['id'])[$fileCounter]->getSize();
                    $reviewedAnsweredTaskFile->url = $request->file('file_' . $answeredTask['id'])[$fileCounter]->store('/assets', 'gcs');
                    $reviewedAnsweredTaskFile->mime_type = $request->file('file_' . $answeredTask['id'])[$fileCounter]->getMimeType();
                    $reviewedAnsweredTaskFile->answered_task_id = $answeredTask['id'];
                    $reviewedAnsweredTaskFile->project_id = $project->id;
                    $reviewedAnsweredTaskFile->user_id = Auth::id();

                    $reviewedAnsweredTaskFile->save();
                }
            }

            $answeredTasksArray[$key] = $answeredTask['id'];
        }

        // update attempted project
        $attemptedProject = AttemptedProject::where('project_id', $project->id)->where('user_id', $routeParameters['userId'])->first();

        $attemptedProject->status = "Assessed";

        $attemptedProject->save();

        // role gained
        $roleGained = new RoleGained;

        $roleGained->role_id = $role->id;
        $roleGained->user_id = $routeParameters['userId'];
        $roleGained->project_id = $project->id;

        $roleGained->save();

        // competency scores
        $competencies = Competency::where('role_id', $role->id)->get()->toArray();

        foreach($competencies as $competency) {
            if($request->input('competencyScore_' . $competency['id']) != null) {
                $competencyScore = new CompetencyScore;

                $competencyScore->competency_id = $competency['id'];
                $competencyScore->role_gained_id = $roleGained->id;
                $competencyScore->score = $request->input('competencyScore_' . $competency['id']);
                $competencyScore->project_id = $project->id;
                $competencyScore->user_id = $routeParameters['userId'];

                $competencyScore->save();
            }
        }

        return redirect('/roles/'.$project->role->slug.'/projects/'.$project->slug.'/'.$routeParameters['userId']);
    }

    public function review() {
        $loggedInUserId = Auth::id();

        $routeParameters = Route::getCurrentRoute()->parameters();
        $role = Role::select('id', 'title', 'slug')->where('slug', $routeParameters['roleSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['role_id', '=', $role->id]])->get()[0];

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

        $answeredTasks = AnsweredTask::where('project_id', $project->id)->where('user_id', $routeParameters['userId'])->orderBy('task_id', 'asc')->get();

        $answeredTasksArray = $answeredTasks->toArray();

        $attemptedProject = AttemptedProject::where('project_id', $project->id)->where('user_id', $routeParameters['userId'])->first();

        $competencyScores = CompetencyScore::where('role_gained_id', $role->id)->where('project_id', $project->id)->where('user_id', $routeParameters['userId'])->get();

        foreach($answeredTasksArray as $key=>$answeredTask) {
            $answeredTasksArray[$key] = $answeredTask['id'];
        }

        if(Auth::id() == $routeParameters['userId']) {
            return redirect('/roles/'.$project->role->slug.'/projects/'.$project->slug);
        } else {
            return view('projects.review', [
                'project' => $project,
                'role' => $role,
                'messages' => $messages3,
                'attemptedProject' => $attemptedProject,
                'answeredTasks' => $answeredTasks,
                'answeredTasksArray' => $answeredTasksArray,
                'competencyScores' => $competencyScores,
                'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                'clickedUserId' => $clickedUserId,
                'reviewedUserId' => $routeParameters['userId']
            ]);
        }
    }

    public function submitProjectAttempt(Request $request) {
        $taskCounter = 1;

        while($request->input('task_' . $taskCounter) != null) {

            $answeredTask = new AnsweredTask;

            if($request->input('multiple-select_' . $taskCounter) == "true") {
                $answeredTask->answer = implode(', ', $request->input('answer_' . $taskCounter));
            } else {
                if($request->input('answer_' . $taskCounter)) {
                    $answeredTask->answer = $request->input('answer_' . $taskCounter);
                } else {
                    $answeredTask->answer = "";
                }
            }
            $answeredTask->response = "";
            $answeredTask->user_id = Auth::id();
            $answeredTask->task_id = $request->input('task_' . $taskCounter);
            $answeredTask->project_id = $request->input('project_id');

            $answeredTask->save();

            // check if file upload is enabled
            if($request->input('file-upload_' . $taskCounter) == "true") {
                if($request->file('file_' . $taskCounter)) {
                    for($fileCounter = 0; $fileCounter < count($request->file('file_' . $taskCounter)); $fileCounter++) {

                        $answeredTaskFile = new AnsweredTaskFile;

                        $answeredTaskFile->title = $request->file('file_' . $taskCounter)[$fileCounter]->getClientOriginalName();
                        $answeredTaskFile->size = $request->file('file_' . $taskCounter)[$fileCounter]->getSize();
                        $answeredTaskFile->url = $request->file('file_' . $taskCounter)[$fileCounter]->store('/assets', 'gcs');
                        $answeredTaskFile->mime_type = $request->file('file_' . $taskCounter)[$fileCounter]->getMimeType();
                        $answeredTaskFile->answered_task_id = $answeredTask->id;
                        $answeredTaskFile->project_id = $request->input('project_id');
                        $answeredTaskFile->user_id = Auth::id();

                        $answeredTaskFile->save();
                    }
                }
            }

            $taskCounter++;
        }

        $attemptedProject = AttemptedProject::where('project_id', $request->input('project_id'))->where('user_id', Auth::id())->first();

        $attemptedProject->status = "Completed";

        $attemptedProject->save();

        return redirect('/roles/'.$request->input('role_slug').'/projects/'.$request->input('project_slug'));
    }

    public function toggleVisibilityProject(Request $request) {
        $project = Project::find($request->input('project_id'));

        // if it is not published and i want to publish it, i need to
        // check that all fields are in

        if(!$project->published) {
            // i need to validate all fields are in

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'brief' => 'required',
                'hours' => 'required',
                'price' => 'required',
                'competency' => 'required',
            ]);


            if($validator->fails()) {
                return redirect('/roles/'.$request->input('role_slug').'/projects/'.$request->input('project_slug'))
                            ->withErrors($validator)
                            ->withInput();
            } else {
                $project->published = !($project->published);
                $project->save();

                return redirect('/roles/'.$request->input('role_slug').'/projects/'.$request->input('project_slug'));
            }
        } else {
            // i just need to make it private, that's all

            $project->published = !($project->published);
            $project->save();

            return redirect('/roles/'.$request->input('role_slug').'/projects/'.$request->input('project_slug'));
        }
    }

    public function show($slug) {
        $loggedInUserId = Auth::id();

        $routeParameters = Route::getCurrentRoute()->parameters();
        $role = Role::select('id', 'title', 'slug')->where('slug', $routeParameters['roleSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['role_id', '=', $role->id]])->get()[0];

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

        $attemptedProject = AttemptedProject::where('project_id', $project->id)->where('user_id', Auth::id())->first();


        if($attemptedProject) {
            //here
            $answeredTasks = AnsweredTask::where('project_id', $project->id)->where('user_id', Auth::id())->orderBy('task_id', 'asc')->get();

            $answeredTasksArray = $answeredTasks->toArray();

            foreach($answeredTasksArray as $key=>$answeredTask) {
                $answeredTasksArray[$key] = $answeredTask['id'];
            }

            if($attemptedProject->status == "Completed") {

                $answeredTasks = AnsweredTask::where('project_id', $project->id)->where('user_id', Auth::id())->orderBy('task_id', 'asc')->get();

                return view('projects.completed', [
                    'project' => $project,
                    'role' => $role,
                    'messages' => $messages3,
                    'answeredTasks' => $answeredTasks,
                    'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                    'clickedUserId' => $clickedUserId
                ]);
            } elseif($attemptedProject->status == "Assessed") {
                $answeredTasks = AnsweredTask::where('project_id', $project->id)->where('user_id', Auth::id())->orderBy('task_id', 'asc')->get();

                $competencyScores = CompetencyScore::where('project_id', $project->id)->where('user_id', Auth::id())->get();


                return view('projects.review', [
                    'project' => $project,
                    'role' => $role,
                    'messages' => $messages3,
                    'attemptedProject' => $attemptedProject,
                    'answeredTasksArray' => $answeredTasksArray,
                    'answeredTasks' => $answeredTasks,
                    'competencyScores' => $competencyScores,
                    'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                    'clickedUserId' => $clickedUserId,
                    'reviewedUserId' => 0
                ]);
            } else {
                return view('projects.attempt', [
                    'project' => $project,
                    'role' => $role,
                    'messages' => $messages3,
                    'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                    'clickedUserId' => $clickedUserId
                ]);
            }
        } else {
            if($project->published == 0 && $project->user_id != Auth::id()) {
                return redirect('/roles/' . $routeParameters['roleSlug']);
            } else {
                return view('projects.show', [
                    'project' => $project,
                    'role' => $role,
                    'messages' => $messages3,
                    'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                    'clickedUserId' => $clickedUserId
                ]); 
            }
        }
    }

    public function edit($roleSlug, $projectSlug) {
        $routeParameters = Route::getCurrentRoute()->parameters();
        $role = Role::select('id', 'title', 'slug', 'description')->where('slug', $routeParameters['roleSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['role_id', '=', $role->id]])->get()[0];

        $competencyIdArray = $project->competencies->toArray();
        foreach($competencyIdArray as $key=>$competencyArray) {
            $competencyIdArray[$key] = $competencyArray['id'];
        }

        return view('projects.edit', [
            'project' => $project,
            'role' => $role,
            'competencyIdArray' => $competencyIdArray
        ]);
    }

    public function create() {
        // check whether or not the user is a creator
        $user = Auth::user();

        if($user->creator) {
            if(session('selectedRole')) {
                $selectedRole = Role::find(session('selectedRole')); 
            }

            return view('projects.create', [
                'selectedRole' => $selectedRole
            ]);
        } else {
            return view('projects.apply');
        }
    }

    public function attempt() {
        $loggedInUserId = Auth::id();

        $routeParameters = Route::getCurrentRoute()->parameters();
        $role = Role::select('id', 'title', 'slug')->where('slug', $routeParameters['roleSlug'])->get()[0];
        $project = Project::where([['slug', '=', $routeParameters['projectSlug']], ['role_id', '=', $role->id]])->get()[0];

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

        if(Auth::id() != $project->user->id) {
            return view('projects.attempt', [
                'project' => $project,
                'role' => $role,
                'messages' => $messages3,
                'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                'clickedUserId' => $clickedUserId
            ]);
        } else {
            return view('projects.show', [
                'project' => $project,
                'role' => $role,
                'messages' => $messages3,
                'messageChannel' => 'messages_'.$subscribeString.'_projects_'.$project->id,
                'clickedUserId' => $clickedUserId
            ]);
        }
    }

    public function purchaseProject(Request $request) {
        $attemptedProject = new AttemptedProject;

        $attemptedProject->project_id = $request->input('project_id');
        $attemptedProject->user_id = Auth::id();
        $attemptedProject->status = "Attempting";

        $attemptedProject->save();

        $project = Project::find($request->input('project_id'));

        // notify creator
        $notification = new Notification;

        $notification->message = "purchased project: " . $project->title;
        $notification->recipient_id = $project->user_id;
        $notification->user_id = Auth::id();
        $notification->url = "/skills/" . $project->role->slug . "/projects/" . $project->slug;

        $notification->save();

        $message = [
            'text' => e("purchased project: " . $project->title),
            'username' => Auth::user()->name,
            'avatar' => Auth::user()->avatar,
            'timestamp' => (time()*1000),
            'projectId' => $project->id,
            'url' => '/notifications'
        ];

        $this->pusher->trigger('notifications_' . $project->user_id, 'new-notification', $message);

        return redirect('/roles/'.$request->input('role_slug').'/projects/'.$request->input('project_slug'));
    }

    public function selectRole() {
        if(request('role') != null) {
            $roleId = request('role');
            session(['selectedRole' => $roleId]);

            return redirect()->action('ProjectsController@create');
        }
        $roles = Role::select('id', 'title')->orderBy('title', 'asc')->get();

        return view('projects.selectRole', [
            'roles' => $roles
        ]);
    }

    public function publishProject(Request $request) {

        // need to validate inputs first before trying to store to database
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'brief' => 'required',
            'hours' => 'required',
            'price' => 'required',
            'competency' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('projects/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $project = new Project;

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->brief = $request->input('brief');
        $project->slug = str_slug($request->input('title'), '-');
        $project->role_id = session('selectedRole');
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

        $roleSlug = Role::find(session('selectedRole'))->slug;

        return redirect('/roles/'.$roleSlug.'/projects/'.$project->slug);
    }

    public function saveProject(Request $request) {

        // need to validate inputs first before trying to store to database
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('projects/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $project = new Project;

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->brief = $request->input('brief');
        $project->slug = str_slug($request->input('title'), '-');
        $project->role_id = session('selectedRole');
        $project->user_id = Auth::id();
        $project->hours = $request->input('hours');
        $project->amount = $request->input('price');
        $project->published = false;

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

        $roleSlug = Role::find(session('selectedRole'))->slug;

        return redirect('/roles/'.$roleSlug.'/projects/'.$project->slug);
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

        // dd($request->file('file-1'));

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

        $roleSlug = Role::find($project->role_id)->slug;

        return redirect('/roles/'.$roleSlug.'/projects/'.$project->slug);
    }
}
