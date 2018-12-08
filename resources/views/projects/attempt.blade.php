@extends ('layouts.main')

@section ('content')
@if($parameter == 'task') 
  <input type="hidden" name="tasksArray" value={{$tasksArray}} id="tasksArray" />
@endif
  <div class="header">
    <div class="container">
      <div class="alert alert-primary" style="margin-top: 1.5rem;">
        <h4 style="margin-bottom: 0;">Project Deadline: {{date('d M Y, h:i a', strtotime($attemptedProject->deadline))}}.</h4>
      </div>
      <!-- Body -->
      <div class="header-body">
        <div class="row align-items-center">
          <div class="col-auto">
            
            <!-- Avatar group -->
            <div class="avatar-group">
              @if(Auth::id() == $project->user->id)
              <a href="/profile" class="avatar">
              @else
              <a href="/profile/{{$project->user->id}}" class="avatar">
              @endif


              @if($project->user->avatar)
              <img src="https://storage.googleapis.com/talentail-123456789/{{$project->user->avatar}}" alt="..." class="avatar-img rounded-circle">
              @else
              <img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle">
              @endif
              </a>
            </div>

            <!-- Button -->
            @if(Auth::id() == $project->user->id)
            <a href="/profile" style="margin-left: 0.5rem !important;">
              {{$project->user->name}}
            </a>
            @else
            <a href="/profile/{{$project->user->id}}" style="margin-left: 0.5rem !important;">
              {{$project->user->name}}
            </a>
            @endif

          </div>
        </div>
        <div class="row align-items-top" style="margin-top: 1.5rem;">
          <div class="col-auto">

            <!-- Avatar -->
            <div class="avatar avatar-lg avatar-4by3">
              @if($project->url)
              <img src="https://storage.googleapis.com/talentail-123456789/{{$project->url}}" alt="..." class="avatar-img rounded">
              @else
              <img src="/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
              @endif
            </div>

          </div>
          <div class="col ml--3 ml-md--2">
            
            <!-- Pretitle -->
            <h6 class="header-pretitle">
              Projects
            </h6>

            <!-- Title -->
            <h1 class="header-title">
              {{$project->title}}
            </h1>

            <p>{{$project->description}}</p>

          </div>
        </div> <!-- / .row -->
        <div class="row align-items-center">
          <div class="col">
            
            <!-- Nav -->
            <ul class="nav nav-tabs nav-overflow header-tabs">
              <li class="nav-item">
                @if($parameter == 'overview')
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}" class="nav-link active">
                  Overview
                </a>
                @else
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}" class="nav-link">
                  Overview
                </a>
                @endif
              </li>
              <li class="nav-item">
                @if($parameter == 'task') 
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}/tasks" class="nav-link active">
                  Tasks
                </a>
                @else
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}/tasks" class="nav-link">
                  Tasks
                </a>
                @endif
              </li>
              <li class="nav-item">
                @if($parameter == 'file') 
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}/files" class="nav-link active">
                  Files
                </a>
                @else
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}/files" class="nav-link">
                  Files
                </a>
                @endif
              </li>
              <li class="nav-item">
                @if($parameter == 'competency') 
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}/competencies" class="nav-link active">
                  Competencies
                </a>
                @else
                <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}/competencies" class="nav-link">
                  Competencies
                </a>
                @endif
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    @if($parameter == 'overview')
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body role-brief">
            @parsedown($project->brief)
          </div> <!-- / .card-body -->
        </div>
      </div>
    </div>
    @elseif($parameter == 'task')
      <form id="attemptForm" method="POST" action="/roles/{{$role->slug}}/projects/{{$project->slug}}/submit-project-attempt" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="project_id" value="{{$project->id}}" />
        <input type="hidden" name="role_slug" value="{{$project->role->slug}}" />
        <input type="hidden" name="project_slug" value="{{$project->slug}}" />
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

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body" style="padding-bottom: 0.5rem;">
                <p>{{$key+1}}. {{$task->title}}</p>
                <input type="hidden" name="task_{{$key+1}}" value="{{$task->id}}" />
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
                  <textarea class="form-control" name="answer_{{$task->id}}" id="answer_{{$task->id}}" rows="5" placeholder="Enter your answer here" style="margin-bottom: 1rem;"></textarea>
                @endif

                @if($task->file_upload) 
                  <div class="box">
                    <input type="file" name="file_{{$task->id}}[]" id="file_{{$task->id}}" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="visibility: hidden; background-color: #076BFF;"/>
                    <label for="file_{{$task->id}}" style="position: absolute; left: 0; margin-left: 1.5rem; margin-bottom: 1.5rem;  border-radius: 0.25rem !important; padding: 0.5rem 1rem 0.5rem 1rem; background: #2c7be5; color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="white"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 1rem;">Choose Files</span></label>
                  </div>
                  <div id="selectedFiles_{{$task->id}}" style="margin-top: 1.5rem; margin-bottom: 0.5rem;"></div>
                @endif
              </div> <!-- / .card-body -->
            </div>
          </div>
        </div>
      @endforeach
        <button type="submit" style="display: none;" id="submitProjectAttempt">Submit</button>
      </form>
    @elseif($parameter == 'file')
      <div class="row">
        <div class="col-lg-12">
          <div class="card" data-toggle="lists" data-lists-values='["name"]'>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Title -->
                  <h4 class="card-header-title">
                    Files
                  </h4>

                </div>
                <div class="col-auto">
                  
                  <!-- Dropdown -->
                  <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                      Sort order
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu">
                      <a class="dropdown-item sort" data-sort="name" href="#!">
                        Asc
                      </a>
                      <a class="dropdown-item sort" data-sort="name" href="#!">
                        Desc
                      </a>
                    </div>

                  </div>
          
                </div>
              </div> <!-- / .row -->
            </div>
            <div class="card-body">

              <!-- List -->
              <ul class="list-group list-group-lg list-group-flush list my--4">
                @if(count($project->project_files))
                @foreach($project->project_files as $projectFile) 
                  <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h4 class="card-title mb-1 name">
                        {{$projectFile->title}}
                      </h4>
                      <p class="card-text small text-muted mb-1">
                        {{round($projectFile->size/1048576, 2)}} MB, {{$projectFile->mime_type}}
                      </p>
                    </div>
                    <div class="col-auto">
                      <a href="https://storage.googleapis.com/talentail-123456789/{{$projectFile->url}}" download="{{$projectFile->title}}" class="btn btn-sm btn-white d-none d-md-inline-block">
                        Download
                      </a>
                    </div>
                  </div>
                </li>
                @endforeach 
                @else
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <p style="margin-bottom: 0;">No files attached to this project yet.</p>
                    </div>
                  </div>
                </li>
                @endif
              </ul>

            </div>
          </div>
        </div>
      </div>
    @else
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body" style="padding-bottom: 0.5rem;">
              @if(count($project->competencies))
                @foreach($project->competencies as $competency)
                <div class="form-group" style="margin-bottom: 0rem;">
                      <span style="float: left;">🌟</span>
                      <p style="margin-left: 2rem;">
                        {{$competency->title}}
                      </p>
                </div>
              @endforeach
              @else
                <p>No competencies tagged to this project yet.</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif
    <button class="btn btn-primary" onclick="submitProjectAttempt()">Submit Project</button>
  </div>

  <script type="text/javascript">
    var tasksArray = document.getElementById("tasksArray").value.split(",");

    var selDiv = "";
    
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
      var selectedFile = 'selectedFiles_';

      for(var l=0; l<tasksArray.length; l++) {
        var taskId = tasksArray[l];

        document.querySelector('#file_' + taskId).addEventListener('change', handleFileSelect, false);
      }
    }
    
    function handleFileSelect(e) {
      if(!e.target.files) return;

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
@endsection

@section ('footer')
@endsection