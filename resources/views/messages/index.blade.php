@extends ('layouts.main')

@section ('content')
    <div class="navbar bg-white breadcrumb-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/messages">Messages</a>
              </li>
          </ol>
      </nav>
    </div>
    <div class="content-container">
        <div class="chat-module" data-filter-list="chat-module-body">
            @if($messages != null && request()->route()->parameters['userId'] != null)
                @if(Request::route('projectId'))
                    <div class="alert alert-warning" style="border-radius: 0px; padding: 0.75rem 1.5rem;">
                        {{$clickedProject->title}}
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
                            <img alt="{{$message->user->name}}" src="https://storage.cloud.google.com/talentail-123456789/{{$message->user->avatar}}" class="avatar" />
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
            <div class="alert alert-light" role="alert" style="height: 100% !important; padding-top: 40% !important;
text-align: center; text-align: center;">
                <h1>👉</h1>
                <h6>Jump into a conversation with other creators & seekers</h6>
            </div>
            @endif
        </div>
        <div class="sidebar collapse" id="sidebar-collapse">
            <div class="sidebar-content">
                <div class="chat-team-sidebar text-small">
                    <div class="chat-team-sidebar-top">
                        <ul class="nav nav-tabs nav-justified" role="tablist" style="margin-top: 0;">
                            <li class="nav-item">
                                <a class="nav-link active" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="true">By User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="false">By Project</a>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-team-sidebar-bottom">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="list-group">
                                <form class="px-3 mb-3">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter users" aria-label="Filter Members" aria-describedby="filter-members">
                                    </div>
                                </form>
                                <div class="list-group list-group-flush">

                                    @foreach($users as $user)
                                    <a class="list-group-item list-group-item-action" href="/messages/{{$user->id}}">
                                        <div class="media media-member mb-0">
                                            <img alt="Claire Connors" src="https://storage.cloud.google.com/talentail-123456789/{{$user->avatar}}" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">{{$user->name}}</h6>
                                                <!-- <span data-filter-by="text">Administrator</span> -->
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab" data-filter-list="dropzone-previews">
                                <form class="px-3 mb-3">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter users" aria-label="Filter Files" aria-describedby="filter-projects">
                                    </div>
                                </form>
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
                                <ul class="list-group list-group-flush"> 
                                    @if(! empty($userProjectObjectArray))
                                    @foreach($userProjectObjectArray as $userProjectObject)
                                    <a class="list-group-item list-group-item-action" href="/messages/{{$userProjectObject->user->id}}/projects/{{$userProjectObject->project->id}}">
                                        <div class="media media-member mb-0">
                                            <img alt="Claire Connors" src="https://storage.cloud.google.com/talentail-123456789/{{$userProjectObject->user->avatar}}" class="avatar" />
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='https://storage.cloud.google.com/talentail-123456789/" + data.avatar + "' class='avatar'><div class='media-body'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
                
                document.getElementById("newMessagesDiv").scrollTop = document.getElementById("newMessagesDiv").scrollHeight;
                
                document.getElementById("chat-input").value = "";
            }); 
        }
    </script>
@endsection

@section ('footer')
    
@endsection