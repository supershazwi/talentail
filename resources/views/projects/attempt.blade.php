@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top" style="display: -webkit-box;">
      <nav aria-label="breadcrumb">
      </nav>
  </div>
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
                <form id="attemptForm" method="POST" action="/roles/{{$role->slug}}/projects/{{$project->slug}}/submit-project-attempt" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="project_id" value="{{$project->id}}" />
                  <input type="hidden" name="role_slug" value="{{$project->role->slug}}" />
                  <input type="hidden" name="project_slug" value="{{$project->slug}}" />
                  <div class="content-list-body">
                    <div class="accordion" id="accordionExample">
                      @foreach($project->tasks as $key=>$task)
                      @if($task->mcq)
                        <input type="hidden" name="task-type_{{$key+1}}" value="mcq" />
                        @if($task->multiple_select)
                          <input type="hidden" name="multiple-select_{{$key+1}}" value="true" />
                        @else
                          <input type="hidden" name="multiple-select_{{$key+1}}" value="false" />
                        @endif
                      @elseif($task->open_ended)
                        <input type="hidden" name="task-type_{{$key+1}}" value="open_ended" />
                      @elseif($task->na)
                        <input type="hidden" name="task-type_{{$key+1}}" value="na" />
                      @endif

                      @if($task->file_upload)
                        <input type="hidden" name="file-upload_{{$key+1}}" value="true" />
                      @else
                        <input type="hidden" name="file-upload_{{$key+1}}" value="false" />
                      @endif

                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <a data-toggle="collapse" data-target="#collapse{{$key+1}}" aria-expanded="true" aria-controls="collapse{{$key+1}}" href="#">
                            {{$key+1}}. {{$task->title}}
                          </a>
                        </div>
                        <input type="hidden" name="task_{{$key+1}}" value="{{$task->id}}" />
                        <div id="collapse{{$key+1}}" class="collapse show" aria-labelledby="heading{{$key+1}}" data-parent="#accordionExample">
                          <div class="card-body" style="padding-bottom: 1rem;">
                            <p>{{$task->description}}</p>
                            @if($task->mcq) 
                              @if($task->multiple_select)
                                @foreach($task->answers as $answer) 
                                  <div class="form-check">
                                    <input class="form-check-input" name="answer_{{$key+1}}[]" type="checkbox" value="{{$answer->title}}" id="answer_{{$task->id}}_{{$answer->id}}">
                                    <label class="form-check-label" for="defaultCheck1">
                                      <p>{{$answer->title}}</p>
                                    </label>
                                  </div>
                                @endforeach
                              @else
                                @foreach($task->answers as $answer) 
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer_{{$task->id}}" id="answer_{{$task->id}}_{{$answer->id}}" value="{{$answer->title}}">
                                    <label class="form-check-label" for="exampleRadios1">
                                      <p>{{$answer->title}}</p>
                                    </label>
                                  </div>
                                @endforeach
                              @endif
                            @elseif($task->open_ended)
                              <textarea class="form-control" name="answer_{{$task->id}}" id="answer_{{$task->id}}" rows="5" placeholder="Enter your answer here"></textarea>
                            @endif

                            @if($task->file_upload) 
                              <div class="box" style="margin-top: 1.5rem;">
                                <input type="file" name="file_{{$task->id}}[]" id="file_{{$task->id}}" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="visibility: hidden; background-color: #076BFF;"/>
                                <label for="file_{{$task->id}}" style="position: absolute; left: 0; margin-left: 1.5rem; margin-bottom: 1.5rem;  border-radius: 0.25rem !important; padding: 0.2rem 1.25rem; height: 36px; background-color: #076BFF;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 1rem;">Choose Files</span></label>
                              </div>
                              <div id="selectedFiles_{{$task->id}}" style="margin-top: 1.5rem;"></div>
                            @endif
                            <!-- <form class="dropzone" action="..." style="margin-bottom: 0px;">
                                <span class="dz-message" style="background-color: rgba(0, 0, 0, 0.03);">Drop files or click here to upload</span>
                            </form> -->
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <button type="submit" style="display: none;" id="submitProjectAttempt">Submit</button>
                </form>
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
                  <div class="content-list-body row" style="margin-bottom: 1.5rem;">
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
            <button class="btn btn-primary pull-right" onclick="submitProjectAttempt()">Submit</button>
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
            document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='https://storage.cloud.google.com/talentail-123456789/" + data.avatar + "' class='avatar'><div class='media-body' style='padding: 0.7rem 1rem;'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
            
            document.getElementById("newMessagesDiv").scrollTop = document.getElementById("newMessagesDiv").scrollHeight;
            
            document.getElementById("chat-input").value = "";
        }); 
    }

    var selDiv = "";
    
    document.addEventListener("DOMContentLoaded", init, false);
  
    function init() {
      var fileCounter = 1;
      var selectedFile = 'selectedFiles_';

      while(document.querySelector('#file_' + fileCounter) != null) {

        if(document.querySelector('#file_' + fileCounter)) {
          document.querySelector('#file_' + fileCounter).addEventListener('change', handleFileSelect, false);
           // selectedFile + fileCounter = document.querySelector("#selectedFiles_" + fileCounter);
        } 

        fileCounter++;
      }
    }
    
    function handleFileSelect(e) {
      if(!e.target.files) return;

      console.log(e.target.id);

      var idString = e.target.id.split("_");
      var idFromString = idString[1];

      document.getElementById('selectedFiles_' + idFromString).innerHTML = "";
      var files = e.target.files;
      for(var i=0; i<files.length; i++) {
        var f = files[i];
        document.getElementById('selectedFiles_' + idFromString).innerHTML += f.name + "<br/>";
      }
    }

    function purchaseProject() {
      document.getElementById("purchaseProjectButton").click();
    }

    function submitProjectAttempt() {
      document.getElementById("submitProjectAttempt").click();
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