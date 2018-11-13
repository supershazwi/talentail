<!doctype html>
<html lang="en">

    <head>
        <title>Talentail: Apply your knowledge onto real world projects</title>
        <link rel="stylesheet" type="text/css" href="/css/custom.css">
        <link rel="stylesheet" type="text/css" href="/css/theme.css">
        <link rel="stylesheet" type="text/css" href="/css/editormd.css" />
        <link rel="stylesheet" type="text/css" href="/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/css/component.css" />
        <link rel="stylesheet" type="text/css" href="/css/toastr.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="/img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="At Talentail, you get to apply what you've learned onto real world projects and gain experience.">

        
        <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    </head>

    <body>

        <div class="layout layout-nav-top layout-sidebar">
            <div class="navbar navbar-expand-lg sticky-top" style="padding-left: 12px; padding-right: 12px; background-color: #F7F9FA; border-bottom: 1px solid #E5E5E5;">
                <a class="navbar-brand" href="/">
                    <img alt="Pipeline" src="/img/logo-updated4.png" style="width: 10rem;"/>
                </a>
                <div class="d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @if(Auth::id())
                    <div class="d-block d-lg-none ml-2">
                        <div class="dropdown">
                            <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->avatar)
                                <img alt="Image" src="http://storage.googleapis.com/talentail-123456789/{{Auth::user()->avatar}}" class="avatar" />
                                @else
                                <img alt="Image" src="/img/avatar.png" class="avatar" />
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="nav-side-user.html" class="dropdown-item">Profile</a>
                                <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
                                <a href="#" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/roles">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/creators">Creators</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/templates">Templates</a>
                        </li>
                    </ul>
                    <div class="d-lg-flex align-items-center">
                        @if(Auth::id())
                        <div class="d-lg-block">
                            <a class="nav-link" href="/messages" style="display: inline;">
                                <i class="fas fa-comment-alt"></i>
                                @if($messageCount > 0)
                                    <sup>{{$messageCount}}</sup>
                                @endif
                            </a>
                            <a class="nav-link" href="/notifications" style="display: inline;"><i class="fas fa-globe-asia"></i></a>
                            <a class="nav-link" href="/shopping-cart" style="display: inline;"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                        <div class="dropdown mx-lg-2">
                            <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New
                            </button>
                            <div class="dropdown-menu" aria-labelledby="newContentButton">
                                <a class="dropdown-item" href="/projects/select-role">Project</a>
                                @if(Auth::user() && Auth::user()->admin)
                                <!-- <a class="dropdown-item" href="/companies/create">Company</a> -->
                                <!-- <a class="dropdown-item" href="/projects/create">Competency</a> -->
                                <a class="dropdown-item" href="/opportunities/create">Opportunity</a>
                                <a class="dropdown-item" href="/roles/create">Role</a>
                                @endif
                            </div>
                        </div>
                        <div class="d-none d-lg-block">
                            <div class="dropdown">
                                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Auth::user()->avatar)
                                    <img alt="Image" src="http://storage.googleapis.com/talentail-123456789/{{Auth::user()->avatar}}" class="avatar" />
                                    @else
                                    <img alt="Image" src="/img/avatar.png" class="avatar" />
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/profile" class="dropdown-item">Profile</a>
                                    <a href="/settings" class="dropdown-item">Account Settings</a>
                                    <a href="/logout" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <a href="/login" class="btn btn-primary btn-block">
                            Login
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="main-container">
                @include('toast::messages')
                <div class="sidebar-container">
                    <button class="btn btn-primary btn-round btn-floating btn-lg d-lg-none" type="button" data-toggle="collapse" data-target="#sidebar-collapse" aria-expanded="false" aria-controls="sidebar-floating-chat">
                        <i class="material-icons">more_horiz</i>
                        <i class="material-icons">close</i>
                    </button>
                    <div class="sidebar collapse" id="sidebar-collapse">
                        <div class="sidebar-content">
                            <div class="chat-team-sidebar text-small">
                                <div class="chat-team-sidebar-top">
                                    <ul class="nav nav-tabs nav-justified" role="tablist" style="margin-top: 0;">
                                        @if(Request::route('projectId'))
                                        <li class="nav-item">
                                            <a class="nav-link" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="true">By User</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="projects-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="false">By Project</a>
                                        </li>
                                        @else
                                        <li class="nav-item">
                                            <a class="nav-link active" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="true">By User</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="false">By Project</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="chat-team-sidebar-bottom">
                                    <div class="tab-content">
                                        @if(Request::route('projectId'))
                                        <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="list-group">
                                            <!-- <form class="px-3 mb-3">
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter users" aria-label="Filter Members" aria-describedby="filter-members">
                                                </div>
                                            </form> -->
                                            <div class="list-group list-group-flush">

                                                @foreach($users as $user)
                                                <a class="list-group-item list-group-item-action" href="/messages/{{$user->id}}">
                                                    <div class="media media-member mb-0">
                                                        @if($user->avatar)
                                                        <img alt="{{$user->name}}" src="http://storage.googleapis.com/talentail-123456789/{{$user->avatar}}" class="avatar" />
                                                        @else
                                                        <img alt="Image" src="/img/avatar.png" class="avatar" />
                                                        @endif
                                                        <div class="media-body">
                                                            <h6 class="mb-0" data-filter-by="text">{{$user->name}}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab" data-filter-list="list-project">
                                            <!-- <form class="px-3 mb-3">
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter users" aria-label="Filter Files" aria-describedby="filter-projects">
                                                </div>
                                            </form> -->
                                            <div class="d-none dz-template">
                                                <li class="list-group-item dz-preview dz-file-preview">
                                                    <div class="media align-items-center dz-details">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary dz-file-representation">
                                                                    <img class="avatar" data-dz-thumbnail />
                                                                    <i class="material-icons">attach_file</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="David Whittaker" src="/img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body d-flex justify-content-between align-items-center">
                                                            <div class="dz-file-details">
                                                                <a href="#" class="dz-filename">
                                                                    <span data-dz-name></span>
                                                                </a>
                                                                <br>
                                                                <span class="text-small dz-size" data-dz-size></span>
                                                            </div>
                                                            <img alt="Loader" src="/img/loader.svg" class="dz-loading" />
                                                            <div class="dropdown">
                                                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons">more_vert</i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Download</a>
                                                                    <a class="dropdown-item" href="#">Share</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item text-danger" href="#" data-dz-remove>Delete</a>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-danger btn-sm dz-remove" data-dz-remove>
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="progress dz-progress">
                                                        <div class="progress-bar dz-upload" data-dz-uploadprogress></div>
                                                    </div>
                                                </li>
                                            </div>
                                            <ul class="list-group list-group-flush list-project"> 
                                                @if(! empty($userProjectObjectArray))
                                                @foreach($userProjectObjectArray as $userProjectObject)
                                                <a class="list-group-item list-group-item-action" href="/messages/{{$userProjectObject->user->id}}/projects/{{$userProjectObject->project->id}}">
                                                    <div class="media media-member mb-0">
                                                        @if($user->avatar)
                                                        <img alt="{{$userProjectObject->user->name}}" src="http://storage.googleapis.com/talentail-123456789/{{$userProjectObject->user->avatar}}" class="avatar" />
                                                        @else
                                                        <img alt="Image" src="/img/avatar.png" class="avatar" />
                                                        @endif
                                                        <div class="media-body">
                                                            <h6 class="mb-0" data-filter-by="text">{{$userProjectObject->user->name}}</h6>
                                                            <span class="badge badge-warning" style="width: 170px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{$userProjectObject->project->title}}</span>
                                                            <!-- <span data-filter-by="text">Administrator</span> -->
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="list-group">
                                            <!-- <form class="px-3 mb-3">
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter users" aria-label="Filter Members" aria-describedby="filter-members">
                                                </div>
                                            </form> -->
                                            <div class="list-group list-group-flush">

                                                @foreach($users as $user)
                                                <a class="list-group-item list-group-item-action" href="/messages/{{$user->id}}">
                                                    <div class="media media-member mb-0">
                                                        @if($user->avatar)
                                                        <img alt="{{$user->name}}" src="http://storage.googleapis.com/talentail-123456789/{{$user->avatar}}" class="avatar" />
                                                        @else
                                                        <img alt="Image" src="/img/avatar.png" class="avatar" />
                                                        @endif
                                                        <div class="media-body">
                                                            <h6 class="mb-0" data-filter-by="text">{{$user->name}}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab" data-filter-list="list-project">
                                            <!-- <form class="px-3 mb-3">
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter users" aria-label="Filter Files" aria-describedby="filter-projects">
                                                </div>
                                            </form> -->
                                            <div class="d-none dz-template">
                                                <li class="list-group-item dz-preview dz-file-preview">
                                                    <div class="media align-items-center dz-details">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary dz-file-representation">
                                                                    <img class="avatar" data-dz-thumbnail />
                                                                    <i class="material-icons">attach_file</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="David Whittaker" src="/img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body d-flex justify-content-between align-items-center">
                                                            <div class="dz-file-details">
                                                                <a href="#" class="dz-filename">
                                                                    <span data-dz-name></span>
                                                                </a>
                                                                <br>
                                                                <span class="text-small dz-size" data-dz-size></span>
                                                            </div>
                                                            <img alt="Loader" src="/img/loader.svg" class="dz-loading" />
                                                            <div class="dropdown">
                                                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons">more_vert</i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Download</a>
                                                                    <a class="dropdown-item" href="#">Share</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item text-danger" href="#" data-dz-remove>Delete</a>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-danger btn-sm dz-remove" data-dz-remove>
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="progress dz-progress">
                                                        <div class="progress-bar dz-upload" data-dz-uploadprogress></div>
                                                    </div>
                                                </li>
                                            </div>
                                            <ul class="list-group list-group-flush list-project"> 
                                                @if(! empty($userProjectObjectArray))
                                                @foreach($userProjectObjectArray as $userProjectObject)
                                                <a class="list-group-item list-group-item-action" href="/messages/{{$userProjectObject->user->id}}/projects/{{$userProjectObject->project->id}}">
                                                    <div class="media media-member mb-0">
                                                        @if($user->avatar)
                                                        <img alt="{{$userProjectObject->user->name}}" src="http://storage.googleapis.com/talentail-123456789/{{$userProjectObject->user->avatar}}" class="avatar" />
                                                        @else
                                                        <img alt="Image" src="/img/avatar.png" class="avatar" />
                                                        @endif
                                                        <div class="media-body">
                                                            <h6 class="mb-0" data-filter-by="text">{{$userProjectObject->user->name}}</h6>
                                                            <span class="badge badge-warning" style="width: 170px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{$userProjectObject->project->title}}</span>
                                                            <!-- <span data-filter-by="text">Administrator</span> -->
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <div class="chat-module" data-filter-list="chat-module-body" style="height: 100% !important;">
                        @if($messages != null && request()->route()->parameters['userId'] != null)
                            @if(Request::route('projectId'))
                                <div class="alert alert-info" style="border-radius: 0px; padding: 0.75rem 1.5rem;">
                                    <strong>Project: </strong><a href="/roles/{{$clickedProject->role->slug}}/projects/{{$clickedProject->slug}}">{{$clickedProject->title}}</a>
                                    <br/>
                                    <strong>User: </strong><a href="/profile/{{$clickedProject->user_id}}">{{$clickedProject->user->name}}</a>
                                </div>
                            @else
                                <div class="alert alert-info" style="border-radius: 0px; padding: 0.75rem 1.5rem;">
                                    <strong>User: </strong><a href="/profile/{{$clickedUserId}}">{{$clickedUser->name}}</a>
                                </div>
                            @endif
                            <div class="chat-module-top">
                                <form>
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">search</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Search chat" aria-label="Search Chat" aria-describedby="search-chat">
                                    </div>
                                </form>
                                <div class="chat-module-body" id="newMessagesDiv">
                                    @foreach($messages as $message)
                                    <div class="media chat-item">
                                        @if($message->user->avatar)
                                        <img alt="{{$message->user->name}}" src="http://storage.googleapis.com/talentail-123456789/{{$message->user->avatar}}" class="avatar" />
                                        @else
                                        <img alt="Image" src="/img/avatar.png" class="avatar" />
                                        @endif
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">
                                                    {{$message->user->name}}
                                                </span>
                                                <span data-filter-by="text">{{$message->created_at->diffForHumans()}}</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>{{$message->message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="chat-module-bottom">
                                <form class="chat-form">
                                    <textarea id="chat-input" class="form-control" placeholder="Type message" rows="2" onkeypress="keyPress()" style="resize: none;"></textarea>
                                    <input id="userId" type="hidden" value="{{Auth::user()->id}}" />
                                    <input id="userName" type="hidden" value="{{Auth::user()->name}}" />
                                    <input id="userAvatar" type="hidden" value="{{Auth::user()->avatar}}" />
                                    <input id="clickedUserId" type="hidden" value="{{$clickedUserId}}" />
                                    <input id="messageChannel" type="hidden" value="{{$messageChannel}}" />
                                    @if(Request::route('projectId'))
                                        <input id="projectId" type="hidden" value="{{$clickedProject->id}}" />
                                    @endif
                                </form>
                            </div>
                            @else
                            <div class="alert alert-warning" style="border-radius: 0px; padding: 0.75rem 1.5rem;">
                                <strong>By user</strong> chat messages are received when users chat with you via your <strong>profile page</strong>.

                                <br/><br />

                                <strong>By project</strong> chat messages are received when users chat with you via your <strong>project page</strong>.
                            </div>
                        @endif
                    </div>
                </div>   
            </div>
        </div>

        <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />
        <input type="hidden" id="currentUrl" value="{{Request::path()}}" />

        <script type="text/javascript">
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            function keyPress() {
                var key = window.event.keyCode;

                if (key === 13) {
                    var messageText = document.getElementById("chat-input").value;
                    var data = {message_text: messageText, clickedUserId: document.getElementById("clickedUserId").value, messageChannel: document.getElementById("messageChannel").value};
                    if(document.getElementById("projectId") != null) {
                        data.projectId = document.getElementById("projectId").value;
                    }
                    
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                       type:'POST',
                       url:'/messages/'+document.getElementById("clickedUserId").value,
                       data: data,
                       success:function(data){

                       }
                    });
                }
            }

            if(document.getElementById("clickedUserId") != null) {
                var pusher = new Pusher("5491665b0d0c9b23a516", {
                  cluster: 'ap1',
                  forceTLS: true,
                  auth: {
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      }
                });

                var channel = pusher.subscribe(document.getElementById("messageChannel").value);
                channel.bind('new-message', function(data) {
                    if(data.avatar == "") {
                     document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='/img/avatar.png' class='avatar'><div class='media-body'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
                    } else {
                      document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='http://storage.googleapis.com/talentail-123456789/" + data.avatar + "' class='avatar'><div class='media-body'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
                    }
                    
                    document.getElementById("newMessagesDiv").scrollTop = document.getElementById("newMessagesDiv").scrollHeight;
                    
                    document.getElementById("chat-input").value = "";
                }); 
            }
        </script>

        <!-- <script type="text/javascript" src="/js/jquery.min.js"></script> -->
        <script type="text/javascript" src="/js/autosize.min.js"></script>
        <script type="text/javascript" src="/js/popper.min.js"></script>
        <script type="text/javascript" src="/js/prism.js"></script>
        <script type="text/javascript" src="/js/draggable.bundle.legacy.js"></script>
        <script type="text/javascript" src="/js/swap-animation.js"></script>
        <script type="text/javascript" src="/js/dropzone.min.js"></script>
        <script type="text/javascript" src="/js/list.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script type="text/javascript" src="/js/theme.js"></script>
        <!-- <script type="text/javascript" src="/js/editormd.js"></script> -->
        <script type="text/javascript" src="/js/custom-file-input.js"></script>
        <script type="text/javascript" src="/js/toastr.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript">

        $(function() {
            var editor = editormd({
                id   : "test-editormd",
                path : "/lib/",
                height: 640
            });
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        </script>

        <script type="text/javascript">
            $(function () {
                toastr.options = {
                    positionClass: 'toast-bottom-right'
                }; 

                var pusher = new Pusher("5491665b0d0c9b23a516", {
                  cluster: 'ap1',
                  forceTLS: true,
                  auth: {
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      }
                });

                var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
                messageChannel.bind('new-message', function(data) {
                    toastr.options.onclick = function () {
                        window.location.replace(data.url);
                    };

                    if('/' + document.getElementById('currentUrl').value != data.url) {
                        toastr.info("<strong>" + data.username + "</strong><br />" + data.text); 
                    }
                });

                var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
                purchaseChannel.bind('new-purchase', function(data) {
                    toastr.success(data.username + ' ' + data.message); 
                });
            })
        </script> 
    </body>
</html>
