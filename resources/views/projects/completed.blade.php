@extends ('layouts.main')

@section ('content')
  <div class="alert alert-warning" style="border-radius: 0px; padding: 0.75rem 1.5rem;">
    This project has been <strong>completed</strong>. <a href="/profile/{{$project->user->id}}">{{$project->user->name}}</a> has been notified to review your submission.
  </div>
  <form method="POST" action="/roles/{{$role->slug}}/projects/{{$project->slug}}/toggle-visibility-project" id="toggleVisibilityProject">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}" />
    <input type="hidden" name="role_slug" value="{{$project->role->slug}}" />
    <input type="hidden" name="project_slug" value="{{$project->slug}}" />
    <button type="submit" style="display: none;" id="toggleVisibilityProjectButton">Submit</button>
  </form>
  <form method="POST" action="/roles/{{$role->slug}}/projects/{{$project->slug}}/purchase-project" id="purchaseProject">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}" />
    <input type="hidden" name="role_slug" value="{{$project->role->slug}}" />
    <input type="hidden" name="project_slug" value="{{$project->slug}}" />
    <button type="submit" style="display: none;" id="purchaseProjectButton">Submit</button>
  </form>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                @if($project->user->avatar)
                <a href="/profile/{{$project->user_id}}" data-toggle="tooltip" data-placement="top" title="">
                    <img class="avatar" src="https://storage.cloud.google.com/talentail-123456789/{{$project->user->avatar}}">
                </a>
                @else
                <a href="/profile/{{$project->user_id}}" data-toggle="tooltip" data-placement="top" title="">
                    <img class="avatar" src="/img/avatar.png">
                </a>
                @endif
                <a href="/profile/{{$project->user_id}}">
                  <span style="font-size: .875rem; line-height: 1.3125rem;">{{$project->user->name}}</span>
                </a>
                <h1 class="display-4 mb-3" style="margin-top: 1.5rem;">{{$project->title}}</h1>
                <p class="lead">{{$project->description}}</p>
            </section>
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#brief" role="tab" aria-controls="brief" aria-selected="true">Role Brief</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#competencies" role="tab" aria-controls="competencies" aria-selected="false">Competencies</a>
                </li>
                @if($project->user->id == Auth::id()) 
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#miscellaneous" role="tab" aria-controls="miscellaneous" aria-selected="false">Miscellaneous</a>
                </li>
                @endif
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="brief" role="tabpanel" aria-labelledby="brief-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Role Brief</h3>
                      </div>
                  </div>
                  <div class="content-list-body">
                      <div class="card mb-3">
                        <div class="card-body role-brief">
                          @parsedown($project->brief)
                        </div>
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Tasks</h3>
                      </div>
                  </div>
                  <div class="content-list-body">
                    <div class="accordion" id="accordionExample">
                      @foreach($answeredTasks as $key=>$answeredTask)
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <a data-toggle="collapse" aria-expanded="true" href="#">
                            {{$key+1}}. {{$answeredTask->task->title}}
                          </a>
                        </div>

                        <div class="collapse show" data-parent="#accordionExample">
                          <div class="card-body">
                            <p>{{$answeredTask->task->description}}</p>
                            @if(!$answeredTask->task->na)
                            <strong>Your Answer:</strong> 
                            @endif
                            <p>{{$answeredTask->answer}}</p>

                            @if($answeredTask->task->file_upload)
                            	<strong>Your Files:</strong> 
                            	<ul class="list-group list-group-activity dropzone-previews flex-column-reverse">
                            	  @foreach($answeredTask->answered_task_files as $answered_task_file)
                            	    <li class="list-group-item" style="border-color: transparent; padding-bottom: 0; padding-left: 0;">
                            	        <div class="media align-items-center">
                            	            <ul class="avatars">
                            	                <li>
                            	                    <div class="avatar bg-primary">
                            	                        <i class="material-icons">insert_drive_file</i>
                            	                    </div>
                            	                </li>
                            	            </ul>
                            	            <div class="media-body d-flex justify-content-between align-items-center">
                            	                <div>
                            	                    <a href="https://storage.cloud.google.com/talentail-123456789/{{$answered_task_file->url}}" download="{{$answered_task_file->title}}">{{$answered_task_file->title}}</a>
                            	                    <br>
                            	                    <span class="text-small" data-filter-by="text">{{round($answered_task_file->size/1048576, 2)}} MB, {{$answered_task_file->mime_type}}</span>
                            	                </div>
                            	            </div>
                            	        </div>
                            	    </li>
                            	  @endforeach 
                            	</ul>
                            @endif
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab" data-filter-list="dropzone-previews">
                <div class="content-list">
                    <div class="row content-list-head">
                        <div class="col-auto">
                            <h3>Files</h3>
                        </div>
                    </div>
                    <!--end of content list head-->
                    <div class="content-list-body row">
                        <div class="col">
                            <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">
                              @foreach($project->project_files as $projectFile) 
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">insert_drive_file</i>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="media-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="https://storage.cloud.google.com/talentail-123456789/{{$projectFile->url}}" download="{{$projectFile->title}}" data-filter-by="text">{{$projectFile->title}}</a>
                                                <br>
                                                <span class="text-small" data-filter-by="text">{{round($projectFile->size/1048576, 2)}} MB, {{$projectFile->mime_type}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                              @endforeach 
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="competencies" role="tabpanel" aria-labelledby="competencies-tab">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>Competencies</h3>
                          </div>
                      </div>
                      @foreach($project->competencies as $competency)
                      <div class="content-list-body">
                          <div class="row">
                              <div class="form-group col">
                                  <div class="form-check">
                                    <i class="fas fa-check form-check-input"></i>
                                    <p>
                                      {{$competency->title}}
                                    </p>
                                  </div>
                              </div>
                              <!--end of form group-->
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <!--end of content list-->
              </div>
              @if($project->user_id == Auth::id())
                <div class="tab-pane fade" id="miscellaneous" role="tabpanel" aria-labelledby="miscellaneous-tab">
                    <div class="content-list">
                        <div class="row content-list-head">
                            <div class="col-auto">
                                <h3>Miscellaneous</h3>
                            </div>
                        </div>
                        <!--end of content list head-->
                        <div class="content-list-body">
                          <h5 style="margin-top: 1.5rem;">Project Price</h5>
                          <p>$ {{$project->amount}}</p>
                          <h5 style="margin-top: 1.5rem;">Project Duration</h5>
                          <p>{{$project->hours}} hours</p>
                        </div>
                    </div>
                    <!--end of content list-->
                </div>
              @endif
          </div>
        </div>
        @if(Auth::id())
        @if(Auth::id() != $project->user_id)
        <button class="btn btn-primary btn-round btn-floating btn-lg" type="button" data-toggle="collapse" data-target="#floating-chat" aria-expanded="false" aria-controls="sidebar-floating-chat">
            <i class="material-icons">chat_bubble</i>
            <i class="material-icons">close</i>
        </button>
        <div class="collapse sidebar-floating" id="floating-chat">
            <div class="sidebar-content">
                <div class="chat-module" data-filter-list="chat-module-body">
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
                                <img alt="{{$message->user->name}}" src="https://storage.cloud.google.com/talentail-123456789/{{$message->user->avatar}}" class="avatar" />
                                @else
                                <img alt="{{$message->user->name}}" src="/img/avatar.png" class="avatar" />
                                @endif
                                <div class="media-body" style="padding: 0.7rem 1rem;">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">{{$message->user->name}}</span>
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
                            <textarea class="form-control" placeholder="Type message" id="chat-input" rows="1" onkeypress="keyPress()"></textarea>
                            @if(Auth::id())
                            <input id="userId" type="hidden" value="{{Auth::user()->id}}" />
                            <input id="userName" type="hidden" value="{{Auth::user()->name}}" />
                            <input id="userAvatar" type="hidden" value="{{Auth::user()->avatar}}" />
                            <input id="clickedUserId" type="hidden" value="{{$clickedUserId}}" />
                            <input id="messageChannel" type="hidden" value="{{$messageChannel}}" />
                            <input id="projectId" type="hidden" value="{{$project->id}}" />
                            <input id="projectOwner" type="hidden" value="{{$project->user->id}}" />
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
      </div>
  </div>

  <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

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
            var data = {message_text: messageText, clickedUserId: document.getElementById("clickedUserId").value, messageChannel: document.getElementById("messageChannel").value, projectId: document.getElementById("projectId").value};
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
            console.log(data);
            if(data.avatar == "") {
              document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='/img/avatar.png' class='avatar'><div class='media-body' style='padding: 0.7rem 1rem;'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
            } else {
              document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='https://storage.cloud.google.com/talentail-123456789/" + data.avatar + "' class='avatar'><div class='media-body' style='padding: 0.7rem 1rem;'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
            }
            
            document.getElementById("newMessagesDiv").scrollTop = document.getElementById("newMessagesDiv").scrollHeight;
            
            document.getElementById("chat-input").value = "";
        }); 
    }

    var selDiv = "";
    
    document.addEventListener("DOMContentLoaded", init, false);
  
    function init() {
      if(document.querySelector('#file-1')) {
        document.querySelector('#file-1').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
      } 
    }
    
    function handleFileSelect(e) {
    
      if(!e.target.files) return;
      
      selDiv.innerHTML = "";
      
      var files = e.target.files;
      for(var i=0; i<files.length; i++) {
        var f = files[i];
        
        selDiv.innerHTML += f.name + "<br/>";

      }
    }

    function toggleVisibilityProject() {
      document.getElementById("toggleVisibilityProjectButton").click();
    }

    function purchaseProject() {
      document.getElementById("purchaseProjectButton").click();
    }

  </script>

  <script type="text/javascript">
      $(function () {
          var pusher = new Pusher("5491665b0d0c9b23a516", {
            cluster: 'ap1',
            forceTLS: true,
            auth: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
          });

          toastr.options = {
              positionClass: 'toast-bottom-right'
          };     

          if(document.getElementById('loggedInUserId').value == document.getElementById('projectOwner').value) {
            var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
            messageChannel.bind('new-message', function(data) {
                toastr.options.onclick = function () {
                    window.location.replace(data.url);
                };

                toastr.info("<strong>" + data.username + "</strong><br />" + data.message); 
            });
          }

          var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
          purchaseChannel.bind('new-purchase', function(data) {
              toastr.success(data.username + ' ' + data.message); 
          });
      })
  </script>
@endsection

@section ('footer')
	
	

@endsection